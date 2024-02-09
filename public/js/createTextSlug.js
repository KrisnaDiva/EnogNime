function createTextSlug(id)
{
    var name = document.getElementById(id).value;
                document.getElementById("slug").value = generateSlug(name);
}
function generateSlug(text)
{
    return text.toString().toLowerCase()
        .replace(/^-+/, '')
        .replace(/-+$/, '')
        .replace(/\s+/g, '-')
        .replace(/\-\-+/g, '-')
        .replace(/[^\w\-]+/g, '');
}