onDOMLoad(() => {

    const df = { year    : 'numeric', month  : 'short'  , day    : '2-digit',
                 weekday : 'short'  , hour   : '2-digit', minute : '2-digit', timeZoneName : 'short'};

    qsa('[data-u]').forEach((e) => {
        const U = e.dataset.u;
        const dateo = new Date(U * 1000);
        const s = dateo.toLocaleDateString([], df);
        inht(e, s);
    });
});

