$(document).ready(function () {
  /**
 * This function works when user clicks on delete button and it deleted a parti
 * cular player's details from DB.
 */
  $(document).on('click', '.delete', function () {
    let id = $(this).data('id');
    $.ajax({
      url: "controller/ajax-delete.php",
      type: "post",
      data: {
        id: id
      },
      success: function (res) {
        $(".default-show").html(res);
      }
    })
  })
  /**
   * A function to edit player's details whenever user clicks on edit button.
   */
  $(document).on('click', '.edit', function () {
    $(".edit-div").show();
    let id = $(this).data('id');
    let name = $(this).closest("tr").find("td:eq(0)").text();
    let ball = $(this).closest("tr").find("td:eq(1)").text();
    let run = $(this).closest("tr").find("td:eq(2)").text();
    $(".name").val(name);
    $(".ball").val(ball);
    $(".run").val(run);
    $(".cross").click(function () {
      $(".edit-div").hide();
    })

    $(".editBtn").unbind().click(function () {
      let upname = $(".name").val();
      let upball = $(".ball").val();
      let uprun = $(".run").val();
      $.ajax({
        url: "controller/ajax-update.php",
        type: "post",
        data: {
          id: id,
          name: upname,
          ball: upball,
          run: uprun
        },
        success: function (res) {
          $(".default-show").html(res);
        }
      })
    })

  })
  /**
   * A function to show who is the man of the match bases on highest strike rate.
   */
  $(".mom").click(function () {
    $.ajax({
      url: "controller/ajax-mom.php",
      type: "post",
      data: {
      },
      success: function (res) {
        $(".result").html(res);
      }
    })
  })
})
