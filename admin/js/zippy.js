document.addEventListener('readystatechange', (e) => {
    const screenWidth = window.outerWidth.toFixed(2);
    console.log(document.readyState);
    createCookie('screenWidth', screenWidth);
})

function createCookie(name, screenWidth) {
  let expiration = "";
  let date = new Date();
  date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
  expiration = "; expires=" + date.toUTCString();

  document.cookie = escape(name) + "=" + escape(screenWidth) + expiration + "; path=/";
}

// if(screenWidth > 650) {
//   const element = document.getElementById("filter-section");
//   const sortForm = '<form action="." method="POST" class="sort-form">' +
//   '<input type="hidden" name="action" value="sort_by_value" />' +
//   '<label for="sort_decision">Sort by:</label>' +
//   '<select name="sort_decision" id="sort_decision" onchange="this.form.submit()">' +
//     '<option>Choose One</option>' +
//     '<option value="1" <?php if($sortedBy == 1) { ?> selected <?php } ?>>Price: High to Low</option>' +
//     '<option value="2" <?php if($sortedBy == 2) { ?> selected <?php } ?>>Price: Low to High</option>' +
//     '<option value="3" <?php if($sortedBy == 3) { ?> selected <?php } ?>>Year: New to Old</option>' +
//     '<option value="4" <?php if($sortedBy == 4) { ?> selected <?php } ?>>Year: Old to New</option>' +
//   '</select>' +
// '</form>';
// console.log(sortForm);
// element.innerHTML = sortForm;
// }