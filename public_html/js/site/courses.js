/**
 * Created by forsa on 2016-09-23.
 */
$(function () {
    var wrapper = $("#wrapper");

    $("table.course").bootstrapTable({
        columns: [
            {
                field: "state",
                checkbox: true
            },
            {
                field: "id",
                title: "ID",
                align: "right",
                sortable: true
            },
            {
                field: "course_name",
                title: "课程名称",
                align: "right",
                sortable: true
            },
            {
                field: "classe_name",
                title: "上课班级",
                align: "right",
                sortable: true
            },
            {
                field: 'operate',
                title: 'Item Operate',
                align: 'center',
                events: {
                    'click .edit': function (e, value, row, index) {
                        alert('You click like action, row: ' + JSON.stringify(row));
                    },
                    'click .remove': function (e, value, row, index) {
                        console.log(e, value, row, index);
                        // $table.bootstrapTable('remove', {
                        //     field: 'id',
                        //     values: [row.id]
                        // });
                    }
                },
                formatter: function () {
                    return $("#tpl-operate").html();
                }
            }],
        url: "/site/courses-ajax",
        toolbar: ".toolbar",
        //search: true,
        pagination: true,
        sidePagination: "server",
        detailView: true,
        detailFormatter: function (index, row, element) {
            setTimeout(function () {
                new Vue({
                    el: el.get(0),
                    data: {
                        students: row.students,
                        schedules: row.schedules
                    }
                });
                el.find(".fullcalendar").fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    firstDay: 1,
                    eventSources: [
                        {
                            url: '/site/course-calendar',
                            data: {
                                id: row.id
                            }
                        }
                    ]
                });
            }, 0);
            var el = $($("#tpl-detail").html());
            return el;
        },
        queryParamsType: "",
        queryParams: function (params) {
            var order = (params.sortOrder == "desc" ? "-" : "");
            return {
                page: params.pageNumber,
                "per-page": params.pageSize,
                sort: order + (params.sortName ? params.sortName : "id")
            };
        }
    });


    mainContentHeightAdjust();
});