onDOMLoad(() => {
    qsa('[data-u]').forEach((e) => {
        inht(e, UtoLocF(e.dataset.u));
    });
});
