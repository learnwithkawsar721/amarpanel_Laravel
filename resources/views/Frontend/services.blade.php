@extends('layouts.frontend')
@section('service')
    active
@endsection
@section('frontend')
    <style>
        .fab.fa-instagram {
            background: linear-gradient(200deg, #d047d1, red, #ff0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 17px;
            padding: 2.4px;
            border-radius: 5px;
            color: #FFF;
            font-weight: lighter;
            margin-right: 10px;
        }

        .fab.fa-facebook-square {
            background: #207eff;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .fab.fa-youtube {
            background: #ff0042;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .fab.fa-twitter {
            background: #1da1f2;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .fab.fa-telegram-plane {
            background: #2b9fd2;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 14px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .fab.fa-soundcloud {
            background: #ff5836;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .fab.fa-spotify {
            background: #62ffa2;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .far.fa-star {
            background: #ffe700;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .fab.fa-tiktok {
            background: #ff0042;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .fab.fa-twitch {
            background: #4b367c;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 14px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fab.fa-pinterest-p {
            background: #ff5858;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .fa.fa-music {
            background: #69C9D0;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 14px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fas.fa-globe {
            background: #ff9e5e;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            margin-right: 10px;
        }

        .fas.fa-stream {
            background: #ccc;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fab.fa-hotjar {
            background: #ff0000;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fab.fa-periscope {
            background: #e24d3a;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fab.fa-linkedin-in {
            background: #0077b0;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 14px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fab.fa-tumblr {
            background: #1c3764;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fab.fa-dailymotion {
            background: #00c9eb;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fas.fa-magic {
            background: #24CA7A;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fab.fa-vimeo-v {
            background: #00a8e8;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fab.fa-apple {
            background: #313131;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

        .fab.fa-snapchat-ghost {
            background: #FFFC00;
            background-clip: text;
            -webkit-background-clip: text;
            font-size: 17px;
            -webkit-text-fill-color: transparent;
            margin-right: 10px;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search-wrap">
                    <div class="input-group input-group-search">
                        <input id="searchService" type="search" name="search" class="form-control search-input"
                            placeholder="Search Services">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </span>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="servicefilter"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            FILTER CATEGORY
                        </button>
                        <div class="dropdown-menu" aria-labelledby="servicefilter">
                            <a value="All Category" ss="dropdown-item" onclick="allser()">All Category</a>
                            @foreach ($categories as $item)

                                <a value="~ Discord Member" class="dropdown-item"
                                    onclick="filterService('id-{{ $item->id }}')">{{ $item->category_name }}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row tab-row">

            <div class="col-sm-12">
                <div class="table-responsive">
                    @foreach ($categories as $item)
                    <table class="table service-tablwa service-tablwa-V2 service-well ">

                            <thead>
                                <tr class="catetitle" data-category="id-{{ $item->id }}" visible="true">
                                    <td colspan="8"><strong><i class="fab fa-thumbs-up"></i>~{{ $item->category_name }}</strong></td>
                                </tr>
                                <tr class="thead-tr" data-category="id-{{ $item->id }}">
                                    <th>ID</th>
                                    <th class="width-service-name">Service</th>
                                    <th class="nowrap">Rate per 1000</th>
                                    <!-- <th class="nowrap"></th> -->
                                    <th class="nowrap">Min order/Max order</th>
                                    <!-- <th>Status</th> -->
                                    <th>Refill</th>
                                    <th class="nowrap">Average time
                                        <span class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top"
                                            title="The average time is based on 10 latest completed orders per 1000 quantity."></span>
                                    </th>
                                    <th class="service-description__th">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                               

                               
                                @foreach ($services as $single_item)
                                @if ($item->id ==$single_item->category_id )
                                    
                                <tr data-category="id-{{ $single_item->category_id }}" visible="true">
                                    <td>
                                        <div class="id-boxi"><span class="tits">ID</span>{{ $single_item->id }}</div>
                                    </td>
                                    <td class="service-name mk-icons">
                                        {{ $single_item->services_name }}
                                    </td>
                                    <td><span class="tits">Rate per 1000</span>
                                        {{ $single_item->reate }}
                                    </td>
                                    <!-- <td><span class="tits">Min order</span>100</td> -->
                                    <td><span class="tits">Max order</span>{{ $single_item->min }}/{{ $single_item->mix }}</td>
                                    <!-- <td><span class="badge working">Working</span></td> -->
                                    <td><span class="badge gurantee not-gurantee">{{ $single_item->refill }}</span></td>
                                    <td class="nowrap "><span class="tits">Average time</span><span
                                            class="average-time ser-id-4472">{{ $single_item->average_time }}</span></td>
                                    <td class="service-description">
                                        <!-- Button trigger modal -->
                                        <a type="button" class="description-btn" data-toggle="modal"
                                            data-target="#exampleModal{{ $single_item->id }}">View
                                            Detail
                                            <!-- <i class="fas fa-info"></i> -->
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $single_item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: #72c73cd1; color:#000">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ $single_item->services_name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="background: #f2f2f2;color:#000;">
                                                        Link: https&#58;//discord.gg/QKnBcfwx<br>Location: Mixed<br>Quality: {{ $single_item->min }}/{{ $single_item->mix }}
                                                        Real Look<br>Start: {{ $single_item->start_time }}
                                                        Minutes<br>Speed: {{ $single_item->speed }}<br>Refill: {{ $single_item->guarante }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                      
                                  @endforeach  

                            </tbody>
                        </table>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".search-wrap").keyup(function() {
                var searchTerm = $("#searchService").val();
                var listItem = $('.service-well tbody').children('tr');
                var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
                $.extend($.expr[':'], {
                    'containsi': function(elem, i, match, array) {
                        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf(
                            (match[3] || "")
                            .toLowerCase()) >= 0;
                    }
                });

                $(".service-well tbody tr:containsi('" + searchSplit + "')").each(function(e) {
                    $(this).attr('visible', 'true');
                });
                $(".service-well thead tr:containsi('" + searchSplit + "')").each(function(e) {
                    $(this).attr('visible', 'true');
                });



                $(".service-well tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
                    $(this).attr('visible', 'false');
                });
                $(".service-well thead tr").not(":containsi('" + searchSplit + "')").each(function(e) {
                    $(this).attr('visible', 'false');
                });






                $("tr.separator:first-child, tr.separator:last-child").each(function(e) {
                    $(this).attr('visible', 'false');
                });








            });






            $("#searchService").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".service-well tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) != -1)
                });
            });


        });


        /*   function filterService(category) {
        alert(category);
        $('.service-well, .service-well tbody tr').attr('visible','false');
        $('.service-well[data-category="' + category + '"], .service-well tbody tr[data-category="' + category + '"]').attr('visible','true');


        }*/
        function filterService(category) {
            $('.service-well tbody tr').attr('visible', 'false');
            $('.service-well tbody tr[data-category="' + category + '"]').attr('visible', 'true');
            $('.service-well thead tr').attr('visible', 'false');
            $('.service-well thead tr[data-category="' + category + '"]').attr('visible', 'true');
        }

        function allser() {
            $(".service-well tbody tr").attr('visible', 'true');
            $(".service-well thead tr").attr('visible', 'true');
        }

    </script>
@endsection
