$(function () {
    $("#submit-profile").click(function () {
        $("#form-profile").submit();
    });
    $("#submit-home").click(function () {
        $("#form-home").submit();
    });
    $("#submit-about").click(function () {
        $("#form-about").submit();
    });
    $("#submit-add-skill").click(function () {
        $("#form-add-skill").submit();
    });
    $(".update-skill").click(function () {
        $id = $(this).attr("skill-id");
        $name = $(this).attr("skill-name");
        $progress = $(this).attr("skill-progress");
        $(".skill-id").attr("value", $id);
        $(".skill-name").attr("value", $name);
        $(".skill-progress").attr("value", $progress);
        $("#exampleModalLabel3").html("Chỉnh sửa kĩ năng: " + $name);
        $("#form-update-skill").attr("action", "/admin/skill/" + $id);
    });
    $("#submit-update-skill").click(function () {
        $("#form-update-skill").submit();
    });
    $("#submit-favorite").click(function () {
        $("#form-favorite").submit();
    });
    $("#submit-favorite-details").click(function () {
        $("#form-favorite-details").submit();
    });
    $(".update-favorite-details").click(function () {
        $id = $(this).attr("favorite-details-id");
        $title = $(this).attr("favorite-title");
        $group = $(this).attr("favorite-group");
        console.log($id);
        $(".favorite-details-id").attr("value", $id);
        $(".favorite-title").attr("value", $title);
        $(".favorite-group").attr("value", $group);
        $("#form-update-favorite-details").attr(
            "action",
            "/admin/favorite/details/" + $id
        );
    });
    $("#submit-update-favorite-details").click(function () {
        $("#form-update-favorite-details").submit();
    });
});
