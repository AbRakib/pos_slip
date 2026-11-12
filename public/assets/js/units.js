(() => {
    const container = document.getElementById('unit-list');

    async function loadUnits() {
        container.setAttribute('aria-busy', 'true');
        try {
            const response = await fetch(container.dataset.url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest', Accept: 'text/html' },
            });
            if (!response.ok) { throw new Error('Unable to load units'); }
            container.innerHTML = await response.text();
            initializeUnits();
            document.getElementById('export-units').disabled = false;
        } catch (error) {
            const message = document.createElement('p');
            message.className = 'product-empty';
            message.setAttribute('role', 'alert');
            message.textContent = 'Unable to load units. ';
            const retry = document.createElement('button');
            retry.type = 'button';
            retry.className = 'product-button';
            retry.textContent = 'Retry';
            retry.addEventListener('click', loadUnits, { once: true });
            message.append(retry);
            container.replaceChildren(message);
        } finally {
            container.setAttribute('aria-busy', 'false');
        }
    }

    function initializeUnits() {
        const tableBody = document.getElementById('unit-rows');
        const rows = Array.from(tableBody.querySelectorAll('[data-unit-row]'));
        const search = document.getElementById('unit-search');
        const status = document.getElementById('unit-status');
        const sort = document.getElementById('unit-sort');
        const pagination = document.getElementById('unit-pagination');

        let openActions = null;

        function closeActions(restoreFocus = false) {
            if (!openActions) { return; }
            const { trigger, menu } = openActions;
            menu.hidden = true;
            trigger.setAttribute('aria-expanded', 'false');
            openActions = null;
            if (restoreFocus) { trigger.focus(); }
        }

        rows.forEach(row => {
            const trigger = row.querySelector('.product-actions-trigger');
            const menu = row.querySelector('.product-actions-menu');
            trigger.addEventListener('click', () => {
                const wasOpen = openActions?.trigger === trigger;
                closeActions();
                if (wasOpen) { return; }
                document.querySelectorAll('.product-dropdown.is-open').forEach(dropdown => dropdown.dispatchEvent(new Event('dropdown-close')));
                menu.hidden = false;
                const bounds = trigger.getBoundingClientRect();
                const menuBounds = menu.getBoundingClientRect();
                menu.style.left = `${Math.max(8, Math.min(bounds.right - menuBounds.width, window.innerWidth - menuBounds.width - 8))}px`;
                menu.style.top = `${Math.max(8, bounds.bottom + menuBounds.height + 6 > window.innerHeight ? bounds.top - menuBounds.height - 6 : bounds.bottom + 6)}px`;
                trigger.setAttribute('aria-expanded', 'true');
                openActions = { trigger, menu };
            });
            menu.addEventListener('click', event => {
                if (event.target.closest('button:not(:disabled)')) { closeActions(true); }
            });
        });
        document.addEventListener('pointerdown', event => {
            if (openActions && !openActions.trigger.contains(event.target) && !openActions.menu.contains(event.target)) { closeActions(); }
        });
        document.addEventListener('keydown', event => {
            if (event.key === 'Escape' && openActions) { event.preventDefault(); closeActions(true); }
        });
        document.addEventListener('focusin', event => {
            if (openActions && !openActions.trigger.contains(event.target) && !openActions.menu.contains(event.target)) { closeActions(); }
        });
        window.addEventListener('resize', () => closeActions());
        document.addEventListener('scroll', () => closeActions(), true);

        function enhanceDropdown(select) {
            const wrapper = document.createElement('div');
            wrapper.className = 'product-dropdown';
            const trigger = document.createElement('button');
            trigger.type = 'button';
            trigger.className = 'product-dropdown-trigger';
            trigger.id = `${select.id}-trigger`;
            trigger.setAttribute('role', 'combobox');
            trigger.setAttribute('aria-haspopup', 'listbox');
            trigger.setAttribute('aria-expanded', 'false');
            trigger.setAttribute('aria-label', select.getAttribute('aria-label'));
            trigger.setAttribute('aria-controls', `${select.id}-options`);
            const label = document.createElement('span');
            const chevron = document.createElement('i');
            chevron.className = 'fas fa-chevron-down';
            chevron.setAttribute('aria-hidden', 'true');
            trigger.append(label, chevron);
            const menu = document.createElement('ul');
            menu.id = `${select.id}-options`;
            menu.className = 'product-dropdown-menu';
            menu.setAttribute('role', 'listbox');
            menu.setAttribute('aria-label', select.getAttribute('aria-label'));
            const options = Array.from(select.options);
            let activeIndex = select.selectedIndex;
            let searchText = '';
            let searchTimer;

            function highlight(index) {
                activeIndex = index;
                Array.from(menu.children).forEach((option, optionIndex) => option.classList.toggle('is-highlighted', optionIndex === index));
                trigger.setAttribute('aria-activedescendant', `${select.id}-option-${index}`);
            }

            function close() {
                wrapper.classList.remove('is-open');
                trigger.setAttribute('aria-expanded', 'false');
                trigger.removeAttribute('aria-activedescendant');
                menu.setAttribute('aria-hidden', 'true');
                clearTimeout(searchTimer);
                searchText = '';
            }

            function open() {
                document.querySelectorAll('.product-dropdown.is-open').forEach(dropdown => dropdown.dispatchEvent(new Event('dropdown-close')));
                wrapper.classList.add('is-open');
                trigger.setAttribute('aria-expanded', 'true');
                menu.removeAttribute('aria-hidden');
                highlight(select.selectedIndex);
            }

            function sync() {
                label.textContent = options[select.selectedIndex].textContent;
                Array.from(menu.children).forEach((option, index) => option.setAttribute('aria-selected', String(index === select.selectedIndex)));
            }

            function choose(index) {
                select.selectedIndex = index;
                sync();
                close();
                select.dispatchEvent(new Event('change', { bubbles: true }));
                trigger.focus();
            }

            options.forEach((option, index) => {
                const item = document.createElement('li');
                item.id = `${select.id}-option-${index}`;
                item.setAttribute('role', 'option');
                const text = document.createElement('span');
                text.textContent = option.textContent;
                const check = document.createElement('i');
                check.className = 'fas fa-check';
                check.setAttribute('aria-hidden', 'true');
                item.append(text, check);
                item.addEventListener('click', () => choose(index));
                item.addEventListener('pointermove', () => highlight(index));
                menu.append(item);
            });
            trigger.addEventListener('click', () => wrapper.classList.contains('is-open') ? close() : open());
            trigger.addEventListener('keydown', event => {
                const isOpen = wrapper.classList.contains('is-open');
                if (event.key === 'Escape' || event.key === 'Tab') {
                    if (event.key === 'Escape' && isOpen) { event.preventDefault(); }
                    close();
                    return;
                }
                if (['ArrowDown', 'ArrowUp', 'Home', 'End'].includes(event.key)) {
                    event.preventDefault();
                    if (!isOpen) { open(); }
                    if (event.key === 'Home') { highlight(0); }
                    else if (event.key === 'End') { highlight(options.length - 1); }
                    else if (isOpen) { highlight((activeIndex + (event.key === 'ArrowDown' ? 1 : -1) + options.length) % options.length); }
                } else if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    if (isOpen) { choose(activeIndex); } else { open(); }
                } else if (event.key.length === 1 && !event.ctrlKey && !event.metaKey && !event.altKey) {
                    if (!isOpen) { open(); }
                    searchText += event.key.toLowerCase();
                    const index = options.findIndex(option => option.textContent.toLowerCase().startsWith(searchText));
                    if (index >= 0) { highlight(index); }
                    clearTimeout(searchTimer);
                    searchTimer = setTimeout(() => { searchText = ''; }, 600);
                }
            });
            wrapper.addEventListener('dropdown-close', close);
            document.addEventListener('pointerdown', event => { if (!wrapper.contains(event.target)) { close(); } });
            wrapper.addEventListener('focusout', event => { if (!wrapper.contains(event.relatedTarget)) { close(); } });
            select.addEventListener('change', sync);
            select.before(wrapper);
            wrapper.append(select, trigger, menu);
            select.hidden = true;
            close();
            sync();
        }

        [status, sort].forEach(enhanceDropdown);
        let currentPage = 1;
        let filteredRows = [];
        const pageSize = 10;

        function pageButton(label, page, disabled, current = false) {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'product-page-button';
            button.textContent = label;
            button.disabled = disabled;
            button.setAttribute('aria-label', label === '‹' ? 'Previous page' : label === '›' ? 'Next page' : `Page ${page}`);
            if (current) {
                button.setAttribute('aria-current', 'page');
            }
            button.addEventListener('click', () => { currentPage = page; render(); });
            return button;
        }

        function render() {
            closeActions();
            const query = search.value.trim().toLowerCase();
            filteredRows = rows.filter(row => `${row.dataset.name} ${row.dataset.shortName}`.toLowerCase().includes(query) && (status.value === 'all' || row.dataset.status === status.value));
            filteredRows.sort((a, b) => {
                if (sort.value === 'name') { return a.dataset.name.localeCompare(b.dataset.name); }
                if (sort.value === 'name-desc') { return b.dataset.name.localeCompare(a.dataset.name); }
                return Number(b.dataset.updated) - Number(a.dataset.updated) || Number(b.dataset.id) - Number(a.dataset.id);
            });
            const pages = Math.max(1, Math.ceil(filteredRows.length / pageSize));
            currentPage = Math.min(currentPage, pages);
            rows.forEach(row => { row.hidden = true; });
            const start = (currentPage - 1) * pageSize;
            filteredRows.slice(start, start + pageSize).forEach(row => { row.hidden = false; tableBody.append(row); });
            document.getElementById('unit-empty').hidden = filteredRows.length > 0;
            document.getElementById('unit-count').textContent = filteredRows.length ? `Showing ${start + 1} – ${Math.min(start + pageSize, filteredRows.length)} of ${filteredRows.length} units` : 'Showing 0 units';
            pagination.replaceChildren();
            if (pages > 1) {
                pagination.append(pageButton('‹', currentPage - 1, currentPage === 1));
                const visiblePages = [...new Set([1, ...Array.from({length: 5}, (_, index) => currentPage - 2 + index).filter(page => page > 1 && page < pages), pages])];
                visiblePages.forEach((page, index) => {
                    if (index && page - visiblePages[index - 1] > 1) { const gap = document.createElement('span'); gap.textContent = '…'; pagination.append(gap); }
                    pagination.append(pageButton(String(page), page, false, page === currentPage));
                });
                pagination.append(pageButton('›', currentPage + 1, currentPage === pages));
            }
        }
        [search, status, sort].forEach(control => control.addEventListener(control === search ? 'input' : 'change', () => { currentPage = 1; render(); }));

        document.getElementById('export-units').addEventListener('click', () => {
            const escapeCell = value => {
                let text = String(value ?? '');
                if (/^[\s]*[=+\-@\t\r]/.test(text)) { text = `'${text}`; }
                return `"${text.replace(/"/g, '""')}"`;
            };
            const records = [['Unit', 'Short Name', 'Status'], ...filteredRows.map(row => [row.dataset.name, row.dataset.shortName, row.dataset.status === '1' ? 'Active' : 'Inactive'])];
            const blob = new Blob(['\uFEFF' + records.map(record => record.map(escapeCell).join(',')).join('\r\n')], {type: 'text/csv;charset=utf-8;'});
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'tea-shop-units.csv';
            link.click();
            setTimeout(() => URL.revokeObjectURL(url), 1000);
        });

        const dialog = document.getElementById('unit-detail');
        rows.forEach(row => row.querySelector('.product-view').addEventListener('click', () => {
            document.getElementById('unit-detail-title').textContent = row.dataset.name;
            const content = document.getElementById('unit-detail-content');
            content.replaceChildren();
            const details = {'Short Name': row.dataset.shortName, Status: row.dataset.status === '1' ? 'Active' : 'Inactive'};
            Object.entries(details).forEach(([label, value]) => {
                const term = document.createElement('dt');
                const description = document.createElement('dd');
                term.textContent = label;
                description.textContent = value;
                content.append(term, description);
            });
            dialog.showModal();
        }));
        document.getElementById('close-unit-detail').addEventListener('click', () => dialog.close());
        dialog.addEventListener('click', event => { if (event.target === dialog) { const bounds = dialog.getBoundingClientRect(); if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) { dialog.close(); } } });
        render();
    }

    loadUnits();
})();
