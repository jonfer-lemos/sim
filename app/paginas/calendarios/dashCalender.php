<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {

            themeSystem: 'bootstrap',
            locale: 'pt-br',

            // headerToolbar: {
            //     left: 'prev',
            //     center: 'title',
            //     right: 'next today'
            // },

            height: 500,

            Object,
            default: {
                close: 'fa-times',
                prev: 'fa-chevron-left',
                next: 'fa-chevron-right',
                prevYear: 'fa-angle-double-left',
                nextYear: 'fa-angle-double-right'
            },
            //initialDate: '2020-01-20',

            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events

            events: 'backCalendario.php',
        });

        calendar.render();
    });
</script>








<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <strong>
                    Programção Preventivas
                </strong>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>

                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>


            </div>
            <!-- /. tools -->
        </div>
        <!-- /.card-header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card-body pt-2">
                    <!--The calendar -->
                    <div id="calendar"></div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                        <h5 class="description-header">Mecânica</h5>
                        <span class="description-text">80</span>
                    </div>
                </div>
                <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                        <h5 class="description-header">Elétrica</h5>
                        <span class="description-text">30</span>
                    </div>
                </div>
                <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                        <h5 class="description-header">Instrumentação</h5>
                        <span class="description-text">20</span>
                    </div>
                </div>
                <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                        <h5 class="description-header">Lubrificação</h5>
                        <span class="description-text">60</span>
                    </div>
                </div>
                <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                        <h5 class="description-header">Inspeção/Preditiva</h5>
                        <span class="description-text">70</span>
                    </div>
                </div>
                <div class="col-sm-2 col-6">
                    <div class="description-block">
                        <h5 class="description-header">Frotas</h5>
                        <span class="description-text">30</span>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-footer -->


    </div>
</div>