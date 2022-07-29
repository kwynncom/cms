onDOMLoad(() => {
    qsa('[data-u]').forEach((e) => {
        const U = e.dataset.u;
        const dateo = new Date(U * 1000);
        
        const df = { weekday: 'short', 'year': 'numeric', 'month' : 'short', 'day' : '2-digit', 'hour' : '2-digit', 'minute' : '2-digit', timeZoneName : 'short'};
        
        let s = dateo.toLocaleDateString([], df);
        inht(e, s);
    });
});

