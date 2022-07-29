onDOMLoad(() => {
    qsa('[data-u]').forEach((e) => {
        const U = e.dataset.u;
        const dateo = new Date(U * 1000);
        
        const df = { weekday: 'short', 'year': '2-digit', 'month' : 'short', 'hour' : '2-digit', 'minute' : '2-digit', timeZoneName : 'short'};
        
        let s = dateo.toLocaleDateString([], df);
        inht(e, s);
    });
});

