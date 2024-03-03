 <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Designed and Developed by
                  <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                    PlainAdmin
                  </a>
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div class="terms d-flex justify-content-center justify-content-md-end">
                <a href="#0" class="text-sm">Term & Conditions</a>
                <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script src="{{asset('js/dynamic-pie-chart.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/fullcalendar.js')}}"></script>
    <script src="{{asset('js/jvectormap.min.js')}}"></script>
    <script src="{{asset('js/world-merc.js')}}"></script>
    <script src="{{asset('js/polyfill.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var calendarMiniEl = document.getElementById("calendar-mini");
        var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
          initialView: "dayGridMonth",
          headerToolbar: {
            end: "today prev,next",
          },
        });
        calendarMini.render();
      });

      // =========== chart two start
      const ctx2 = document.getElementById("Chart2").getContext("2d");
      const chart2 = new Chart(ctx2, {
        type: "bar",
        data: {
          labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "",
              backgroundColor: "#365CF5",
              borderRadius: 30,
              barThickness: 6,
              maxBarThickness: 8,
              data: [
                600, 700, 1000, 700, 650, 800, 690, 740, 720, 1120, 876, 900,
              ],
            },
          ],
        },
        options: {
          plugins: {
            tooltip: {
              callbacks: {
                titleColor: function (context) {
                  return "#8F92A1";
                },
                label: function (context) {
                  let label = context.dataset.label || "";

                  if (label) {
                    label += ": ";
                  }
                  label += context.parsed.y;
                  return label;
                },
              },
              backgroundColor: "#F3F6F8",
              titleAlign: "center",
              bodyAlign: "center",
              titleFont: {
                size: 12,
                weight: "bold",
                color: "#8F92A1",
              },
              bodyFont: {
                size: 16,
                weight: "bold",
                color: "#171717",
              },
              displayColors: false,
              padding: {
                x: 30,
                y: 10,
              },
          },
          },
          legend: {
            display: false,
            },
          legend: {
            display: false,
          },
          layout: {
            padding: {
              top: 15,
              right: 15,
              bottom: 15,
              left: 15,
            },
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              grid: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
                max: 1200,
                min: 0,
              },
            },
            x: {
              grid: {
                display: false,
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                drawTicks: false,
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          },
          plugins: {
            legend: {
              display: false,
            },
            title: {
              display: false,
            },
          },
        },
      });
      // =========== chart two end
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#roleTable").DataTable();

        $("#userTable").DataTable();

        $("#categoryTable").DataTable();

        $("#subCatTable").DataTable();

        $("#childCatTable").DataTable();

        $("#brandTable").DataTable();

        $("#productTable").DataTable();

        $(".deleteBtn").click(function() {
          if (!confirm('Are you sure?')) {
            return false;
          }
        });

        let subCat = $("#subCat").val();
        let subCatId = $("#subCatId").val();

        if (subCat != undefined && subCatId != undefined) {
          var html = "<option value="+subCatId+" selected>"+subCat+"</option>";
          $("#sub_categories").html(html);
        }

        $("#categories").change(function() {
          var cat_id = $(this).val();
          var html = "<option value=''>Select Sub Categories</option>";
          var subCatId = $("#subCatId").val();
          if (cat_id == "") {
            $("#sub_categories").html(html);
          } else {
            $.ajax({
              url:"{{ url('getSubCategory') }}/"+cat_id,
              type:"GET",
              success:function(response) {
                $.each(response.data, function(key, value) {
                  if (subCatId != undefined) {
                    if (subCatId == value.id) {
                      html += "<option value="+value.id+" selected>"+value.sub_category_name+"</option>";
                    } else {
                      html += "<option value="+value.id+">"+value.sub_category_name+"</option>";
                    }
                    
                  } else {
                    html += "<option value="+value.id+">"+value.sub_category_name+"</option>";
                  }
                });

                $("#sub_categories").html(html);
              }
            })
          }
        });

        let childCat = $("#childCatName").val();
        let childCatId = $("#childCatId").val();

        if (childCat != undefined && childCatId != undefined) {
          var html = "<option value="+childCatId+" selected>"+childCat+"</option>";
          $("#child_categories").html(html);
        }

        $("#sub_categories").change(function() {
          var sub_cat_id = $(this).val();
          var html = "<option value=''>Select Child Categories</option>";
          var childCatId = $("#childCatId").val();
          if (sub_cat_id == "") {
            $("#child_categories").html(html);
          } else {
            $.ajax({
              url:"{{ url('getChildCategory') }}/"+sub_cat_id,
              type:"GET",
              success:function(response) {
                $.each(response.data, function(key, value) {
                  if (childCatId != undefined) {
                    if (childCatId == value.id) {
                      html += "<option value="+value.id+" selected>"+value.child_category_name+"</option>";
                    } else {
                      html += "<option value="+value.id+">"+value.child_category_name+"</option>";
                    }
                    
                  } else {
                    html += "<option value="+value.id+">"+value.child_category_name+"</option>";
                  }
                });

                $("#child_categories").html(html);
              }
            })
          }
        });

      });
    </script>
  </body>
</html>