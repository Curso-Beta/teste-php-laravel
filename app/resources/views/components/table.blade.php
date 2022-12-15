@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

<div class="container flex justify-center mx-auto">
    <div class="flex flex-col col-sm-10">
        <div class="w-full">
            <div class="form-group flex justify-end bg-dark p-2 rounded-top">
                <div class="col-sm-2 p-2">
                    <label class="form-label text-white" for="limit">Items Por Página</label>
                    <select id="limit" name="limit" class="form-control" value="">
                        <option id="limit10" value="10">10</option>
                        <option id="limit20" value="20">20</option>
                        <option id="limit50" value="50">50</option>
                        <option id="limit100" value="100">100</option>
                    </select>
                </div>
                <a href="{{ $routeCreate }}">
                <button type="button" class="btn btn-success active">Adicionar</button>
                </a>
            </div>
            <div class="table-responsive p-12 shadow">
                <table id="indexTable" class="table table-dark table-hover table-striped table-responsive rounded">
                    <thead>
                        <tr>
                            @foreach ($heads as $head)
                            <th class="px-6 py-2 text-lg text-white align-center column-head" data-sorted="asc" data-column="@isset($attr[$head])
                                {{$attr[$head]}}
                            @endisset">
                                {{ $head }}
                                <i class="material-icons asc hidden">arrow_drop_up</i>
                                <i class="material-icons desc hidden">arrow_drop_down</i>
                            </th>
                            @endforeach
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                        <tr>
                            <input type="hidden" class="del" id="search" name="search">
                            <th></th>
                            <th></th>
                            @foreach ($filters as $filter)
                            <th>
                                <input class="form-control form-control-sm search-input" type="text" id="{{$filter}}" name="{{$filter}}" placeholder="{{$filter}}">
                                <input type="hidden" id="columns" name="columns" value="{{json_encode($columns)}}">
                            </th>
                            @endforeach
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="indexTableData">
                    </tbody>
                </table>
                <div class="bg-dark p-2 rounded">
                    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                        <div class="flex justify-between flex-1">

                            <p class="text-sm text-light leading-5">
                                Showing
                                <span id="from" class="font-medium"></span>
                                to
                                <span id="to" class="font-medium"></span>
                                of
                                <span id="total" class="font-medium"></span>
                                results
                            </p>

                        </div>

                        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <span id="pages" class="relative z-0 inline-flex shadow-sm rounded-md">
                                    <button id="first" type="button" class="btn btn-outline-light">1</button>
                                    <button id="previous" type="button" class="btn btn-outline-light">Anterior</button>
                                    <button id="current" type="button" class="btn btn-outline-light active"></button>
                                    <button id="next" type="button" class="btn btn-outline-light">Próximo</button>
                                    <button id="last" type="button" class="btn btn-outline-light"></button>
                                </span>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>

@section('javascripts')
<script src="https://code.jquery.com/jquery-3.5.1.js" prefer></script>
<script>
    let orderBy = 'id';
    let sortedBy = 'asc';
    let columns;
    let baseUrl;
    let editUrl;
    let model;
    let current_page;

    $(".column-head").click(function() {
        $(".asc").addClass('hidden');
        $(".desc").addClass('hidden');

        if ($(this).attr('data-sorted') === 'asc') {
            $(this).attr('data-sorted', 'desc');
            $(this).children('.desc').removeClass('hidden');
            sortedBy = 'desc';
            orderBy = $(this).attr('data-column').trim();
        } else {
            $(this).attr('data-sorted', 'asc');
            $(this).children('.asc').removeClass('hidden');
            sortedBy = 'asc';
            orderBy = $(this).attr('data-column').trim();
        }
    });

    $(document).ready(function() {
        $.get("{{$action}}", function(data) {

            drawTable(data);

        });
    });

    function drawTable(data) {
        $("#indexTableData").empty();
        columns = data.meta.columns;
        baseUrl = "{{Route('home')}}";
        model = data.meta.model;
        path = data.meta.path+"?page=1";
        current_page = data.meta.current_page;
        $("#limit").val(data.meta.per_page);
        $("#limit").attr('data-url', path);
        $.each(data.data, function(index, value) {
            $("<tr id='row" + value.id + "'></tr>").appendTo('#indexTableData');
            $("<td><input type='checkbox'></td>").appendTo('#row' + value.id);
            data.meta.columns.forEach(
                column => $("<td>" + value[column] + "</td>").appendTo('#row' + value.id)
            );
            $("<td><a href='" + baseUrl + "/" + model + "/" + value.id + "/edit'><button class='btn btn-primary edit' data-for='" + value.id + "' type='button'><i class='material-icons text-primary'>edit</i></button></a></td>").appendTo('#row' + value.id);
            $("<td><button class='btn btn-primary del' type='button' data-url='"+data.meta.path+"' data-for='"+value.id+"' ><i class='material-icons text-primary'>delete</i></button></td>").appendTo('#row' + value.id);
        });
        $("#from").text(data.meta.from);
        $("#to").text(data.meta.to);
        $("#total").text(data.meta.total);
        $("#current").text(data.meta.current_page);
        $("#last").text(data.meta.last_page);
        $("#previous").attr('data-url', data.links.prev);
        $("#next").attr('data-url', data.links.next);
        $("#first").attr('data-url', data.links.first);
        $("#last").attr('data-url', data.links.last);
        $(".search-input").attr('data-url', path);
        hidePagingButtons(data.meta.current_page, 1, data.meta.last_page)
        this.createDelEventListener();
    }

    function getData(url, old) {
        let searchFields = [];
        columns.forEach(
            column => {
                if ($("#" + column).val() !== "") {
                    searchFields.push(column + "=" + $("#" + column).val() + "")
                }
            }
        );
        searchFields.push("limit=" + $("#limit").val());
        searchFields.push("orderBy=" + orderBy);
        searchFields.push("sortedBy=" + sortedBy);
        searchFields = searchFields.join("&");
        searchFields = searchFields.trim();
        searchFields = clearColumns(searchFields);
        
        console.log(url);
        $.ajax({
            url: url + searchFields,
            type: "get",
            accepts: 'application/json',
        }).done(function(data) {
            drawTable(data);
        });
    }

    function deleteItem(url, item) {
        $.ajax({
            url: url+"/"+item,
            type: 'DELETE',
            success: function(result) {
                getData(url+"?page="+current_page);
            }
        });
    }

    function clearColumns(columns) {
        columns = columns.replace(" ", "")
        columns = columns.replace("id=undefined", "");
        if ($("#email") !== undefined) {
            columns = columns.replace("email", "mail");
        }
        return columns;
    }

    function hidePagingButtons(current_page, first_page, last_page) {
        let near;
        let far;
        if (current_page === first_page) {
            near = "previous";
            far = "first";
        }
        if (current_page === last_page) {
            near = "next";
            far = "last";
        } else {
            $("#previous").addClass('d-flex');
            $("#next").addClass('d-flex');
            $("#first").addClass('d-flex');
            $("#last").addClass('d-flex');
        }

        if (current_page === first_page || current_page === last_page) {
            $("#" + near).addClass('hidden');
            $("#" + far).addClass('hidden');
            $("#" + near).removeClass('d-flex');
            $("#" + far).removeClass('d-flex');
        } else {
            $("#" + near).addClass('d-flex');
            $("#" + far).addClass('d-flex');
            $("#" + near).removeClass('hidden');
            $("#" + far).removeClass('hidden');
        }
    }

    function createDelEventListener(){
        $(".del").click(function(){
            console.log($(this).attr("data-url"));
            deleteItem($(this).attr("data-url"),$(this).attr("data-for"));
        });
    }

    $("#previous").click(function() {
        getData($("#previous").attr('data-url'), $("#columns").val());
    });
    $("#next").click(function() {
        getData($("#next").attr('data-url'), $("#columns").val());
    });
    $("#first").click(function() {
        getData($("#first").attr('data-url'), $("#columns").val());
    });
    $("#last").click(function() {
        getData($("#last").attr('data-url'), $("#columns").val());
    });
    $("#limit").change(function(value) {
        getData($(this).attr('data-url'), $("#columns").val());
    });
    $("#limit10").click(function() {
        $("#limit").change($(this).val());
    });
    $("#limit20").click(function() {
        $("#limit").change($(this).val());
    });
    $("#limit50").click(function() {
        $("#limit").change($(this).val());
    });
    $("#limit100").click(function() {
        $("#limit").change($(this).val());
    });
    $(".search-input").keyup(function() {
        getData($(this).attr('data-url'), $("#columns").val());
    });
</script>
@endsection