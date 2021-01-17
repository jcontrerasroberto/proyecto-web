function getPDF() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const ID = urlParams.get('id');
    window.location.href="../backend/descargarpdf.php?id="+ID;
}