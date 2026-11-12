                    <div class="summary-grid">
                        @foreach ([['Total Products', $products->count(), 'All listed products', 'layer-group', 'blue'], ['Active Products', $products->where('status', 1)->count(), 'Available for sale', 'check-circle', 'green'], ['Inactive Products', $products->where('status', '!=', 1)->count(), 'Currently inactive', 'exclamation-triangle', 'gold'], ['Average Sell Price', '৳' . number_format($products->avg('sell_price') ?? 0, 2), 'Across all products', 'coins', 'purple']] as [$label, $value, $description, $icon, $color])
<article class="summary-card {{ $color }}"><span class="summary-icon"><i class="fas fa-{{ $icon }}" aria-hidden="true"></i></span><div><h2>{{ $label }}</h2><strong>{{ $value }}</strong><p>{{ $description }}</p></div></article>
 @endforeach
                            </div>

                            <section class="dashboard-panel product-panel" aria-labelledby="products-title">
                            <div class="panel-heading product-toolbar">
                            <h2 id="products-title"><i class="fas fa-cubes" aria-hidden="true"></i>
                            Products</h2>
                            <div class="product-filters">
                            <label class="product-search"><i class="fas fa-search"
                            aria-hidden="true"></i><input id="product-search" type="search"
                            placeholder="Search products (name, SKU)..."
                            aria-label="Search products by name or SKU"></label>
                            <select id="product-status" aria-label="Filter by status"><option
                            value="all">All Status</option><option
                            value="1">Active</option><option
                            value="0">Inactive</option></select>
                            <select id="product-sort" aria-label="Sort products"><option value="newest">Sort
                            by: Newest</option><option value="name">Name: A–Z</option><option
                            value="price-low">Price: Low to High</option><option
                            value="price-high">Price: High to Low</option></select>
                            </div>
                            </div>
                            <div class="product-table-wrap">
                            <table class="product-table">
                            <thead><tr><th scope="col">Product</th><th
                            scope="col">Description</th><th scope="col">Cost Price</th><th
                            scope="col">Sell Price</th><th scope="col">Profit</th><th
                            scope="col">Status</th><th scope="col">Last Updated</th><th
                            scope="col" class="text-center" aria-label="Actions"><i class="fas fa-cog"
                            aria-hidden="true"></i></th></tr></thead>
                            <tbody id="product-rows">
                            @foreach ($products as $product)
                            @php
                                $profit = (float) $product->sell_price - (float) $product->cost_price;
                                $markup =
                                    (float) $product->cost_price > 0
                                        ? ($profit / (float) $product->cost_price) * 100
                                        : null;
                            @endphp
                            <tr data-product-row data-name="{{ $product->name }}" data-code="{{ $product->code }}"
                            data-description="{{ $product->description }}" data-cost="{{ $product->cost_price }}"
                            data-price="{{ $product->sell_price }}"
                            data-status="{{ $product->status === 1 ? '1' : '0' }}"
                            data-updated="{{ $product->updated_at?->timestamp ?? 0 }}"
                            data-id="{{ $product->id }}">
                            <th scope="row"><div class="product-identity"><span
                            class="product-thumbnail"><i class="fas fa-mug-hot"
                            aria-hidden="true"></i></span><div><strong>{{ $product->name }}</strong><span>SKU:
                            {{ $product->code }}</span></div></div></th>
                            <td class="product-description">{{ $product->description ?: '—' }}</td>
                            <td>৳{{ number_format($product->cost_price, 2) }}</td>
                            <td>৳{{ number_format($product->sell_price, 2) }}</td>
                            <td
                            class="{{ $profit >= 0 ? 'product-profit' : 'product-loss' }}">৳{{ number_format($profit, 2) }}
                            @if ($markup !== null)
                            <small>({{ number_format($markup, 1) }}%)</small>
                        @endif
                        </td>
                        <td><span
                        class="product-badge {{ $product->status === 1 ? 'active' : 'inactive' }}">{{ $product->status === 1 ? 'Active' : 'Inactive' }}</span></td>
                        <td
                        class="product-updated">{{ $product->updated_at?->format('M d, Y, h:i A') ?? '—' }}</td>
                        <td>
                        <div class="product-row-actions">
                        <button type="button" class="product-actions-trigger"
                        aria-label="Actions for {{ $product->name }}" aria-expanded="false"
                        aria-controls="product-actions-{{ $product->id }}" title="Product actions"><i
                        class="fas fa-ellipsis-v" aria-hidden="true"></i></button>
                        <div id="product-actions-{{ $product->id }}" class="product-actions-menu" hidden>
                        <button type="button" class="product-action-item product-view"><i
                        class="fas fa-eye" aria-hidden="true"></i> Preview</button>
                        <button type="button" class="product-action-item" disabled
                        title="Editing coming soon"><i class="fas fa-pen" aria-hidden="true"></i>
                        Edit</button>
                        <button type="button" class="product-action-item danger" disabled
                        title="Deletion coming soon"><i class="fas fa-trash-alt"
                        aria-hidden="true"></i> Delete</button>
                        </div>
                        </div>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <p id="product-empty" class="product-empty"
                        @if ($products->isNotEmpty()) hidden @endif>No products found.</p>
                        </div>
                        <footer class="product-table-footer"><span id="product-count"
                        aria-live="polite">{{ $products->count() }} products</span><nav
                        id="product-pagination" aria-label="Product pagination"></nav></footer>
                        </section>)
