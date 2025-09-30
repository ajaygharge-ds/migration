jQuery(function ($) {
  var paged = 2;
  const postsPerPage = 6;
  let loading = false;

  $(".btn-wrap").on("click", ".view-more-blogs", function (e) {
    e.preventDefault();
    if (loading) return;
    loading = true;
    const $btn = $(this);
    const $loader = $btn.siblings(".loader");

    $btn.hide();
    $loader.show();

    $.post(trooBlogsAjax.ajaxurl, {
      action: "load_more_blogs",
      paged: paged,
      per_page: postsPerPage,
      _ajax_nonce: trooBlogsAjax.nonce,
    }).done(function (res) {
      if (res.success && res.data.html) {
        $(".posts-grid").append(res.data.html);

        paged++;
        if (paged > res.data.total_pages) {
          $btn.hide();
        } else {
          $btn.show();
        }
      } else {
        $btn.hide();
      }
      $loader.hide();
      loading = false;
    });
  });
});
