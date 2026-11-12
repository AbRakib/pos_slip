(() => {
    const periods = {
        monthly: { labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], values: [2500, 10000, 16000, 12000, 20500, 15500, 24000, 19500, 28000, 24000, 31500, 40000] },
        weekly: { labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'], values: [12000, 18500, 15000, 24500, 22000, 35000, 40000] },
        yearly: { labels: ['2021', '2022', '2023', '2024', '2025', '2026'], values: [12000, 18000, 23000, 31000, 35000, 40000] }
    };
    function renderPeriod(period) {
        const { labels, values } = periods[period];
        const points = values.map((value, index) => [65 + index * 565 / (values.length - 1), 190 - value / 50000 * 170]);
        const path = points.map(([x, y], index) => `${index ? 'L' : 'M'} ${x} ${y}`).join(' ');
        document.getElementById('sales-line').setAttribute('d', path);
        document.getElementById('sales-area').setAttribute('d', `${path} L 630 190 L 65 190 Z`);
        document.getElementById('sales-points').innerHTML = points.map(([x, y], index) => `<circle cx="${x}" cy="${y}" r="4.5" fill="#246bff" stroke="white" stroke-width="1.5"><title>${labels[index]}: ৳${values[index].toLocaleString()}</title></circle>`).join('');
        document.getElementById('sales-labels').innerHTML = points.map(([x], index) => `<text x="${x}" y="211" text-anchor="middle">${labels[index]}</text>`).join('');
        document.getElementById('sales-chart-title').textContent = `Sample ${period} sales in taka`;
        document.querySelectorAll('[data-period]').forEach(button => {
            const active = button.dataset.period === period;
            button.classList.toggle('active', active);
            button.setAttribute('aria-pressed', String(active));
        });
    }
    document.querySelectorAll('[data-period]').forEach(button => button.addEventListener('click', () => renderPeriod(button.dataset.period)));
    renderPeriod('monthly');
})();
