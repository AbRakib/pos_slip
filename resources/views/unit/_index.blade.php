<div class="summary-grid">
    <article class="summary-card blue">
        <span class="summary-icon"><i class="fas fa-ruler" aria-hidden="true"></i></span>
        <div><h2>Total Units</h2><strong>{{ $units->count() }}</strong><p>All listed units</p></div>
    </article>
    <article class="summary-card green">
        <span class="summary-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
        <div><h2>Active Units</h2><strong>{{ $units->where('status', 1)->count() }}</strong><p>Available for use</p></div>
    </article>
    <article class="summary-card gold">
        <span class="summary-icon"><i class="fas fa-exclamation-triangle" aria-hidden="true"></i></span>
        <div><h2>Inactive Units</h2><strong>{{ $units->where('status', '!=', 1)->count() }}</strong><p>Currently inactive</p></div>
    </article>
</div>

<section class="dashboard-panel product-panel" aria-labelledby="units-title">
    <div class="panel-heading product-toolbar">
        <h2 id="units-title"><i class="fas fa-ruler" aria-hidden="true"></i> Units</h2>
        <div class="product-filters">
            <label class="product-search"><i class="fas fa-search" aria-hidden="true"></i><input id="unit-search" type="search" placeholder="Search units (name, short name)..." aria-label="Search units by name or short name"></label>
            <select id="unit-status" aria-label="Filter by status">
                <option value="all">All Status</option><option value="1">Active</option><option value="0">Inactive</option>
            </select>
            <select id="unit-sort" aria-label="Sort units">
                <option value="newest">Sort by: Newest</option><option value="name">Name: A–Z</option><option value="name-desc">Name: Z–A</option>
            </select>
        </div>
    </div>
    <div class="product-table-wrap">
        <table class="product-table">
            <thead>
                <tr><th scope="col">Unit</th><th scope="col">Short Name</th><th scope="col">Status</th><th scope="col">Last Updated</th><th scope="col" class="text-center">Actions</th></tr>
            </thead>
            <tbody id="unit-rows">
                @foreach ($units as $unit)
                    <tr data-unit-row data-name="{{ $unit->name }}" data-short-name="{{ $unit->short_name }}" data-status="{{ $unit->status === 1 ? '1' : '0' }}" data-updated="{{ $unit->updated_at?->timestamp ?? 0 }}" data-id="{{ $unit->id }}">
                        <th scope="row"><div class="product-identity"><span class="product-thumbnail"><i class="fas fa-ruler" aria-hidden="true"></i></span><strong>{{ $unit->name }}</strong></div></th>
                        <td>{{ $unit->short_name }}</td>
                        <td><span class="product-badge {{ $unit->status === 1 ? 'active' : 'inactive' }}">{{ $unit->status === 1 ? 'Active' : 'Inactive' }}</span></td>
                        <td class="product-updated">{{ $unit->updated_at?->format('M d, Y, h:i A') ?? '—' }}</td>
                        <td>
                            <div class="product-row-actions">
                                <button type="button" class="product-actions-trigger" aria-label="Actions for {{ $unit->name }}" aria-expanded="false" aria-controls="unit-actions-{{ $unit->id }}" title="Unit actions"><i class="fas fa-ellipsis-v" aria-hidden="true"></i></button>
                                <div id="unit-actions-{{ $unit->id }}" class="product-actions-menu" hidden>
                                    <button type="button" class="product-action-item product-view"><i class="fas fa-eye" aria-hidden="true"></i> Preview</button>
                                    <button type="button" class="product-action-item" disabled title="Editing coming soon"><i class="fas fa-pen" aria-hidden="true"></i> Edit</button>
                                    <button type="button" class="product-action-item danger" disabled title="Deletion coming soon"><i class="fas fa-trash-alt" aria-hidden="true"></i> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p id="unit-empty" class="product-empty" @if ($units->isNotEmpty()) hidden @endif>No units found.</p>
    </div>
    <footer class="product-table-footer"><span id="unit-count" aria-live="polite">{{ $units->count() }} units</span><nav id="unit-pagination" aria-label="Unit pagination"></nav></footer>
</section>
