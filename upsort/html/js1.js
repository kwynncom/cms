onDOMLoad(() => {
    qsa('[data-u]').forEach((e) => {
        const U = e.dataset.u;
        const dateo = new Date(U * 1000);
        // dateo.setTime();
        const dtfo  = new Intl.DateTimeFormat([], { dateStyle: 'medium', timeStyle: 'long' });
        inht(e, dtfo.format(dateo));
    });
});

