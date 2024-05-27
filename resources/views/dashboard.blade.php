@extends('layouts/default')
{{-- Page title --}}
@section('title')
{{ trans('general.dashboard') }}
@parent
@stop


{{-- Page content --}}
@section('content')

@if ($snipeSettings->dashboard_message!='')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!!  Helper::parseEscapedMarkedown($snipeSettings->dashboard_message)  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
  <!-- panel -->
  <div class="col-lg-2 col-xs-6">
      <a href="{{ route('hardware.index') }}">
    <!-- small box -->
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>{{ number_format(\App\Models\Asset::AssetsForShow()->count()) }}</h3>
        <p>{{ strtolower(trans('general.assets')) }}</p>
      </div>
      <div class="icon" aria-hidden="true">
        <i class="fas fa-barcode" aria-hidden="true"></i>
      </div>
      @can('index', \App\Models\Asset::class)
        <a href="{{ route('hardware.index') }}" class="small-box-footer">{{ trans('general.view_all') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
      @endcan
    </div>
      </a>
  </div><!-- ./col -->

  <div class="col-lg-2 col-xs-6">
     <a href="{{ route('licenses.index') }}">
    <!-- small box -->
    <div class="small-box bg-maroon">
      <div class="inner">
        <h3>{{ number_format($counts['license']) }}</h3>
        <p>{{ strtolower(trans('general.licenses')) }}</p>
      </div>
      <div class="icon" aria-hidden="true">
        <i class="far fa-save"></i>
      </div>
        @can('view', \App\Models\License::class)
          <a href="{{ route('licenses.index') }}" class="small-box-footer">{{ trans('general.view_all') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
        @endcan
    </div>
     </a>
  </div><!-- ./col -->


  <div class="col-lg-2 col-xs-6">
    <!-- small box -->
      <a href="{{ route('accessories.index') }}">
    <div class="small-box bg-orange">
      <div class="inner">
        <h3> {{ number_format($counts['accessory']) }}</h3>
        <p>{{ strtolower(trans('general.accessories')) }}</p>
      </div>
      <div class="icon" aria-hidden="true">
        <i class="far fa-keyboard"></i>
      </div>
      @can('index', \App\Models\Accessory::class)
          <a href="{{ route('accessories.index') }}" class="small-box-footer">{{ trans('general.view_all') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
      @endcan
    </div>
      </a>
  </div><!-- ./col -->

  <div class="col-lg-2 col-xs-6">
    <!-- small box -->

      <a href="{{ route('consumables.index') }}">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3> {{ number_format($counts['consumable']) }}</h3>
        <p>{{ strtolower(trans('general.consumables')) }}</p>
      </div>
      <div class="icon" aria-hidden="true">
        <i class="fas fa-tint"></i>
      </div>
      @can('index', \App\Models\Consumable::class)
        <a href="{{ route('consumables.index') }}" class="small-box-footer">{{ trans('general.view_all') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
      @endcan
    </div>
  </div><!-- ./col -->

  <div class="col-lg-2 col-xs-6">
    <a href="{{ route('components.index') }}">
   <!-- small box -->
   <div class="small-box bg-yellow">
     <div class="inner">
       <h3>{{ number_format($counts['component']) }}</h3>
       <p>{{ strtolower(trans('general.components')) }}</p>
     </div>
     <div class="icon" aria-hidden="true">
       <i class="far fa-hdd"></i>
     </div>
       @can('view', \App\Models\License::class)
         <a href="{{ route('components.index') }}" class="small-box-footer">{{ trans('general.view_all') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
       @endcan
   </div>
    </a>
 </div><!-- ./col -->

 <div class="col-lg-2 col-xs-6">
    <a href="{{ route('users.index') }}">
   <!-- small box -->
   <div class="small-box bg-light-blue">
     <div class="inner">
       <h3>{{ number_format($counts['user']) }}</h3>
       <p>{{ strtolower(trans('general.people')) }}</p>
     </div>
     <div class="icon" aria-hidden="true">
       <i class="fas fa-users"></i>
     </div>
       @can('view', \App\Models\License::class)
         <a href="{{ route('users.index') }}" class="small-box-footer">{{ trans('general.view_all') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
       @endcan
   </div>
    </a>
 </div><!-- ./col -->

</div>
</div>

@if ($counts['grand_total'] == 0)

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ trans('general.dashboard_info') }}</h2>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="progress">
                                <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">{{ trans('general.60_percent_warning') }}</span>
                                </div>
                            </div>


                            <p><strong>{{ trans('general.dashboard_empty') }}</strong></p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @can('create', \App\Models\Asset::class)
                            <a class="btn bg-teal" style="width: 100%" href="{{ route('hardware.create') }}">{{ trans('general.new_asset') }}</a>
                            @endcan
                        </div>
                        <div class="col-md-3">
                            @can('create', \App\Models\License::class)
                                <a class="btn bg-maroon" style="width: 100%" href="{{ route('licenses.create') }}">{{ trans('general.new_license') }}</a>
                            @endcan
                        </div>
                        <div class="col-md-3">
                            @can('create', \App\Models\Accessory::class)
                                <a class="btn bg-orange" style="width: 100%" href="{{ route('accessories.create') }}">{{ trans('general.new_accessory') }}</a>
                            @endcan
                        </div>
                        <div class="col-md-3">
                            @can('create', \App\Models\Consumable::class)
                                <a class="btn bg-purple" style="width: 100%" href="{{ route('consumables.create') }}">{{ trans('general.new_consumable') }}</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@else

<!-- recent activity -->
<div class="row">
  <div class="col-md-8">
    <div class="box">
      <div class="box-header with-border">
        <h2 class="box-title">{{ trans('general.recent_activity') }}</h2>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-hidden="true">
                <i class="fas fa-minus" aria-hidden="true"></i>
                <span class="sr-only">{{ trans('general.collapse') }}</span>
            </button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">

                <table
                    data-cookie-id-table="dashActivityReport"
                    data-height="350"
                    data-pagination="false"
                    data-id-table="dashActivityReport"
                    data-side-pagination="server"
                    data-sort-order="desc"
                    data-sort-name="created_at"
                    id="dashActivityReport"
                    class="table table-striped snipe-table"
                    data-url="{{ route('api.activity.index', ['limit' => 25]) }}">
                    <thead>
                    <tr>
                        <th data-field="icon" data-visible="true" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter"><span  class="sr-only">{{ trans('admin/hardware/table.icon') }}</span></th>
                        <th class="col-sm-3" data-visible="true" data-field="created_at" data-formatter="dateDisplayFormatter">{{ trans('general.date') }}</th>
                        <th class="col-sm-2" data-visible="true" data-field="admin" data-formatter="usersLinkObjFormatter">{{ trans('general.admin') }}</th>
                        <th class="col-sm-2" data-visible="true" data-field="action_type">{{ trans('general.action') }}</th>
                        <th class="col-sm-3" data-visible="true" data-field="item" data-formatter="polymorphicItemFormatter">{{ trans('general.item') }}</th>
                        <th class="col-sm-2" data-visible="true" data-field="target" data-formatter="polymorphicItemFormatter">{{ trans('general.target') }}</th>
                    </tr>
                    </thead>
                </table>



            </div><!-- /.responsive -->
          </div><!-- /.col -->
          <div class="text-center col-md-12" style="padding-top: 10px;">
            <a href="{{ route('reports.activity') }}" class="btn btn-primary btn-sm" style="width: 100%">{{ trans('general.viewall') }}</a>
          </div>
        </div><!-- /.row -->
      </div><!-- ./box-body -->
    </div><!-- /.box -->
  </div>
  <div class="col-md-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title">
                    {{ (\App\Models\Setting::getSettings()->dash_chart_type == 'name') ? trans('general.assets_by_status') : trans('general.assets_by_status_type') }}
                </h2>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-hidden="true">
                        <i class="fas fa-minus" aria-hidden="true"></i>
                        <span class="sr-only">{{ trans('general.collapse') }}</span>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="chart-responsive">
                            <canvas id="statusPieChart" height="260"></canvas>
                        </div> <!-- ./chart-responsive -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div><!-- /.box-body -->
        </div> <!-- /.box -->
  </div>

</div> <!--/row-->
<div class="row">
    <div class="col-md-6">

		@if ($snipeSettings->full_multiple_companies_support=='1')
			 <!-- Companies -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h2 class="box-title">{{ trans('general.companies') }}</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fas fa-minus" aria-hidden="true"></i>
							<span class="sr-only">{{ trans('general.collapse') }}</span>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
							<table
									data-cookie-id-table="dashCompanySummary"
									data-height="400"
									data-pagination="true"
									data-side-pagination="server"
									data-sort-order="desc"
									data-sort-field="assets_count"
									id="dashCompanySummary"
									class="table table-striped snipe-table"
									data-url="{{ route('api.companies.index', ['sort' => 'assets_count', 'order' => 'asc']) }}">

								<thead>
								<tr>
									<th class="col-sm-3" data-visible="true" data-field="name" data-formatter="companiesLinkFormatter" data-sortable="true">{{ trans('general.name') }}</th>
									<th class="col-sm-1" data-visible="true" data-field="users_count" data-sortable="true">
										<i class="fas fa-users" aria-hidden="true"></i>
										<span class="sr-only">{{ trans('general.people') }}</span>
									</th>
									<th class="col-sm-1" data-visible="true" data-field="assets_count" data-sortable="true">
										<i class="fas fa-barcode" aria-hidden="true"></i>
										<span class="sr-only">{{ trans('general.asset_count') }}</span>
									</th>
									<th class="col-sm-1" data-visible="true" data-field="accessories_count" data-sortable="true">
										<i class="far fa-keyboard" aria-hidden="true"></i>
										<span class="sr-only">{{ trans('general.accessories_count') }}</span>
									</th>
									<th class="col-sm-1" data-visible="true" data-field="consumables_count" data-sortable="true">
										<i class="fas fa-tint" aria-hidden="true"></i>
										<span class="sr-only">{{ trans('general.consumables_count') }}</span>
									</th>
									<th class="col-sm-1" data-visible="true" data-field="components_count" data-sortable="true">
										<i class="far fa-hdd" aria-hidden="true"></i>
										<span class="sr-only">{{ trans('general.components_count') }}</span>
									</th>
									<th class="col-sm-1" data-visible="true" data-field="licenses_count" data-sortable="true">
										<i class="far fa-save" aria-hidden="true"></i>
										<span class="sr-only">{{ trans('general.licenses_count') }}</span>
									</th>
								</tr>
								</thead>
							</table>
							</div>
						</div> <!-- /.col -->
						<div class="text-center col-md-12" style="padding-top: 10px;">
							<a href="{{ route('companies.index') }}" class="btn btn-primary btn-sm" style="width: 100%">{{ trans('general.viewall') }}</a>
						</div>
					</div> <!-- /.row -->

				</div><!-- /.box-body -->
			</div> <!-- /.box -->

		@else
			 <!-- Locations -->
			 <div class="box box-default">
				<div class="box-header with-border">
					<h2 class="box-title">{{ trans('general.locations') }}</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fas fa-minus" aria-hidden="true"></i>
							<span class="sr-only">{{ trans('general.collapse') }}</span>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
							<table
									data-cookie-id-table="dashLocationSummary"
									data-height="400"
									data-pagination="true"
									data-side-pagination="server"
									data-sort-order="desc"
									data-sort-field="assets_count"
									id="dashLocationSummary"
									class="table table-striped snipe-table"
									data-url="{{ route('api.locations.index', ['sort' => 'assets_count', 'order' => 'asc']) }}">

								<thead>
								<tr>
									<th class="col-sm-3" data-visible="true" data-field="name" data-formatter="locationsLinkFormatter" data-sortable="true">{{ trans('general.name') }}</th>

									<th class="col-sm-1" data-visible="true" data-field="assets_count" data-sortable="true">
										<i class="fas fa-barcode" aria-hidden="true"></i>
										<span class="sr-only">{{ trans('general.asset_count') }}</span>
									</th>
									<th class="col-sm-1" data-visible="true" data-field="assigned_assets_count" data-sortable="true">

										{{ trans('general.assigned') }}
									</th>
									<th class="col-sm-1" data-visible="true" data-field="users_count" data-sortable="true">
										<i class="fas fa-users" aria-hidden="true"></i>
										<span class="sr-only">{{ trans('general.people') }}</span>

									</th>

								</tr>
								</thead>
							</table>
							</div>
						</div> <!-- /.col -->
						<div class="text-center col-md-12" style="padding-top: 10px;">
							<a href="{{ route('locations.index') }}" class="btn btn-primary btn-sm" style="width: 100%">{{ trans('general.viewall') }}</a>
						</div>
					</div> <!-- /.row -->

				</div><!-- /.box-body -->
			</div> <!-- /.box -->

		@endif

    </div>
    <div class="col-md-6">

        <!-- Categories -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title">{{ trans('general.asset') }} {{ trans('general.categories') }}</h2>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fas fa-minus" aria-hidden="true"></i>
                        <span class="sr-only">{{ trans('general.collapse') }}</span>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table
                                data-cookie-id-table="dashCategorySummary"
                                data-height="400"
                                data-pagination="true"
                                data-side-pagination="server"
                                data-sort-order="desc"
                                data-sort-field="assets_count"
                                id="dashCategorySummary"
                                class="table table-striped snipe-table"
                                data-url="{{ route('api.categories.index', ['sort' => 'assets_count', 'order' => 'asc']) }}">

                            <thead>
                            <tr>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">{{ trans('general.name') }}</th>
                                <th class="col-sm-3" data-visible="true" data-field="category_type" data-sortable="true">
                                    {{ trans('general.type') }}
                                </th>
                                <th class="col-sm-1" data-visible="true" data-field="assets_count" data-sortable="true">
                                    <i class="fas fa-barcode" aria-hidden="true"></i>
                                    <span class="sr-only">{{ trans('general.asset_count') }}</span>
                                </th>
                                <th class="col-sm-1" data-visible="true" data-field="accessories_count" data-sortable="true">
                                    <i class="far fa-keyboard" aria-hidden="true"></i>
                                    <span class="sr-only">{{ trans('general.accessories_count') }}</span>
                                </th>
                                <th class="col-sm-1" data-visible="true" data-field="consumables_count" data-sortable="true">
                                    <i class="fas fa-tint" aria-hidden="true"></i>
                                    <span class="sr-only">{{ trans('general.consumables_count') }}</span>
                                </th>
                                <th class="col-sm-1" data-visible="true" data-field="components_count" data-sortable="true">
                                    <i class="far fa-hdd" aria-hidden="true"></i>
                                    <span class="sr-only">{{ trans('general.components_count') }}</span>
                                </th>
                                <th class="col-sm-1" data-visible="true" data-field="licenses_count" data-sortable="true">
                                    <i class="far fa-save" aria-hidden="true"></i>
                                    <span class="sr-only">{{ trans('general.licenses_count') }}</span>
                                </th>
                            </tr>
                            </thead>
                        </table>
                        </div>
                    </div> <!-- /.col -->
                    <div class="text-center col-md-12" style="padding-top: 10px;">
                        <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm" style="width: 100%">{{ trans('general.viewall') }}</a>
                    </div>
                </div> <!-- /.row -->

            </div><!-- /.box-body -->
        </div> <!-- /.box -->
    </div>
</div>

@endif


@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['simple_view' => true, 'nopages' => true])
@stop

@push('js')



<script nonce="{{ csrf_token() }}">
    // ---------------------------
    // - ASSET STATUS CHART -
    // ---------------------------
      var pieChartCanvas = $("#statusPieChart").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas);
      var ctx = document.getElementById("statusPieChart");
      var pieOptions = {
              legend: {
                  position: 'top',
                  responsive: true,
                  maintainAspectRatio: true,
              },
              tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        counts = data.datasets[0].data;
                        total = 0;
                        for(var i in counts) {
                            total += counts[i];
                        }
                        prefix = data.labels[tooltipItem.index] || '';
                        return prefix+" "+Math.round(counts[tooltipItem.index]/total*100)+"%";
                    }
                }
              }
          };

      $.ajax({
          type: 'GET',
          url: '{{ (\App\Models\Setting::getSettings()->dash_chart_type == 'name') ? route('api.statuslabels.assets.byname') : route('api.statuslabels.assets.bytype') }}',
          headers: {
              "X-Requested-With": 'XMLHttpRequest',
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          },
          dataType: 'json',
          success: function (data) {
              var myPieChart = new Chart(ctx,{
                  type   : 'pie',
                  data   : data,
                  options: pieOptions
              });
          },
          error: function (data) {
              // window.location.reload(true);
          },
      });
        var last = document.getElementById('statusPieChart').clientWidth;
        addEventListener('resize', function() {
        var current = document.getElementById('statusPieChart').clientWidth;
        if (current != last) location.reload();
        last = current;
    });
</script>

<script async nonce="{{ csrf_token() }} ">

  generateTailoredContent();
  fetchDataForTailoredContent();

  function generateTailoredContent() {
    const htmlContent = `
      <div id="tailored">
        <!-- Asets By Purchase Graph -->
        <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h2 class="box-title">Purchases in Last 3 months</h2>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-hidden="true">
                    <i class="fas fa-minus" aria-hidden="true"></i>
                    <span class="sr-only">{{trans('general.collapse')}}</span>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="chart-responsive">
                      <canvas id="purchasesByDatesGraph" style="max-height:"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Asets By Category In Locations Graph -->
        <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h2 class="box-title">Assets By Categories In Locations</h2>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-hidden="true">
                    <i class="fas fa-minus" aria-hidden="true"></i>
                    <span class="sr-only">{{trans('general.collapse')}}</span>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="chart-responsive">
                      <canvas id="categoriesInLocationsBarChart" style="height:"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Asets By Models In Locations Graph -->
        <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h2 class="box-title">Assets By Models In Locations</h2>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-hidden="true">
                    <i class="fas fa-minus" aria-hidden="true"></i>
                    <span class="sr-only">{{trans('general.collapse')}}</span>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="chart-responsive">
                      <canvas id="modelsInLocationsBarChart" style="height:"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Models & Location Table -->
        <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h2 class="box-title"> {{trans('general.asset_model')}} & {{trans('general.locations')}} </h2>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-hidden="true">
                    <i class="fas fa-minus" aria-hidden="true"></i>
                    <span class="sr-only">{{trans('general.collapse')}}</span>
                  </button>
                </div>
              </div>
              <div class="box-body border-0">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive border border-info">
                      <table id="categoryStatusDataTable" class="table table-bordered table-sm table-hover" style="overflow-y: hidden">
                        <thead class="table-primary">
                          <tr>
                            <th class="align-top" width="10%">Location</th>
                            <th class="align-top" width="10%">Total</th>
                            <!-- Dynamic category headers -->
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body will be generated by jQuery DataTable -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    `;

    // Append the generated HTML to the content section after the first two divs
    $('.content > #webui > div:nth-child(1)').after(htmlContent);
  }

  function fetchDataForTailoredContent() {
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: '{{ route('api.assets.custom.tailored') }}',
      headers: { "X-Requested-With": 'XMLHttpRequest', "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')},
      success: function (data) {
        try { generateCategoryStatusDataTables("categoryStatusDataTable", data) }             catch (e) {console.log(e); console.log("generateCategoryStatusDataTables")}
        try { generateCategoriesInLocationsBarChart("categoriesInLocationsBarChart", data) }  catch (e) {console.log(e); console.log("generateCategoriesInLocationsBarChart")}
        try { generateModelsInLocationsBarChart("modelsInLocationsBarChart", data) }          catch (e) {console.log(e); console.log("generateModelsInLocationsBarChart")}
        try { generatePurchasesByDatesGraph('purchasesByDatesGraph', data) }                  catch (e) {console.log(e); console.log("generatePurchasesByDatesGraph")}
      },
      error: function (data) {
        // window.location.reload(true);
      },
    });
  }

  function generateCategoryStatusDataTables(id, data) {
    let categories = data.category_names;

    // Generate table headers for categories
    categories.forEach(function(category) {
      $(`#${id} thead tr`).append('<th scope="col" width="4%" class="align-top">' + generateAcronym(category) + '</th>');
    });

    // Function to generate table rows
    function generateRows(location, totalCount, overallStatus) {

      let overallStatusArr = []
      overallStatusArr = Object
        .keys(overallStatus)
        .map((key) =>
        `<br>
          <span>${key}: ${overallStatus[key]}</span>`
        )

      let row = '<tr>';
      row +=      '<td class="text-bold">' + location + '</td>';
      row +=      `<td>${totalCount == 0 ? '' : `Total: ${totalCount} ${overallStatusArr}`}</td>`;

      // Generate cells for each category
      categories.forEach(function(category) {
          let categoryCount = 0;
          let statusArr = []
          let point = data.assets_by_location[location].categories[category]
          if (point) {
              categoryCount += point.count;
              statusArr = Object
                .keys(point?.status)
                .map((key) =>
                  `<br>
                  <span>${generateAcronym(key)}: ${point?.status[key]}
                  </span>`
                )
          }
          row += `<td>${categoryCount == 0 ? '' : `Total: ${categoryCount} ${statusArr}`}</td>`;
      });

      row +=    '</tr>';
      return row;
    }

    // Generate table rows
    for (let location in data.assets_by_location) {
      let locationData = data.assets_by_location[location];
      let totalCount = locationData.count;
      let overallStatus = locationData.status;
      let row = generateRows(location, totalCount, overallStatus);
      $(`#${id} tbody`).append(row);
    }
  }

  function generateModelsInLocationsBarChart(id, data) {
    let barChartCanvas = $(`#${id}`).get(0).getContext("2d");
    let barChart = new Chart(barChartCanvas);
    let ctx = document.getElementById(id);
    let barOptions = (graphData => { return {
      maintainAspectRatio: false,
      aspectRatio: 0.5,
      responsive: true,
      layout: {
        padding: {
          top: 50,
          bottom: 0,
          left: 0,
          right: 0
        },
      },
      scales: {
        xAxes: [{
          display: true,
          stacked: true,
          scaleLabel: {
            display: true,
            labelString: 'Location'
          }
        }],
        yAxes: [{
          display: true,
          stacked: true,
          scaleLabel: {
            display: true,
            labelString: 'Asset Count'
          },
          ticks: {
            // min: graphData.limits.min,
            // max: graphData.limits.max,
            stepSize: 50,
          },
          beforeBuildTicks: function(axis) {
          }
        }]
      },
      legend: {
        display: false,
        position: 'left',
        responsive: true,
        labels: {
          generateLabels: function(chart) {
            let data = chart.data;
            if (Object.keys(data.modelsColors).length && data.datasets.length) {
              return Object.keys(data.modelsColors).map(function(key) {
                return {
                  text: key,
                  fillStyle: data.modelsColors[key] || '#000',
                };
              });
            }
            return [];
          },
          font: {
            size: 1, // Reduce the font size
          },
          boxWidth: 10, // Reduce the box width
        }
      },
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            let dataset = data.datasets[tooltipItem.datasetIndex];
            let location = data.labels[tooltipItem.index];
            let modelName = dataset.label;
            let total = dataset.data[tooltipItem.index];
            let status = dataset.status[location] // dataset.status[tooltipItem.index];
            let statusArr = Object.keys(status).map((key) => ` ${key}: ${status[key]}`)

            // console.log(location, modelName, total, status, tooltipItem.datasetIndex, data)

            return `${modelName} - ${location}: ${total} -${statusArr}`;
          }
        }
      }
    }});

    function buildDataset(data) {
      let colorMap = {};
      let models = data.model_names
      let locations = data.location_names
      let colors = generateColors(models.length)
      models.forEach((model, index) => { colorMap[model] = colors[index];});

      let datasets = models.map((model, index) => {
        let extraDataObj = {};

        if(data.assets_by_model[model] && data.assets_by_model[model].locations) {
          Object.keys(data.assets_by_model[model].locations).forEach(location => {
            let target = data?.assets_by_model[model]?.locations[location]
            extraDataObj[location] = target
          })
        }

        return {
          label: model,
          extraData: extraDataObj,
          backgroundColor: colorMap[model],
          stack: `Stack ${index}`
        }
      }).map((obj, index) => {
        let statusArr = {};
        return {
          barPercentage: 0.7,
          barAspectRation: 0.2,
          label: obj.label,
          data: locations.map(location => {
            if(obj.extraData.hasOwnProperty(location)) {
              let modelInLocation = obj.extraData[location]
              statusArr[location] = {Total: modelInLocation.count, ...modelInLocation.status}
              return modelInLocation.count
            } else {
              return 0
            }
          }),
          status: statusArr,
          backgroundColor: obj.backgroundColor,
          hoverBackgroundColor: obj.backgroundColor,
          stack: `Stack 0`
        }
      })

      let max = datasets.reduce((acc, row) => {
        let rowMax = Math.max(...row.data);
        return Math.max(acc, rowMax);
      }, Number.NEGATIVE_INFINITY);

      let min = datasets.reduce((acc, row) => {
        let rowMax = Math.min(...row.data);
        return Math.min(acc, rowMax);
      }, Number.POSITIVE_INFINITY);

      let graphData = {
        limits: { max, min },
        labels: locations,
        modelsColors: colorMap,
        datasets: [...datasets]
      }

      return graphData
    }

    let graphData = buildDataset(data)
    let myBarChart = new Chart(ctx,{
      type   : 'bar',
      data   : graphData,
      options: barOptions(graphData)
    });

    let last = document.getElementById(id).clientWidth;
    addEventListener('resize', function() {
      let current = document.getElementById(id).clientWidth;
      if (current != last) location.reload();
      last = current;
    });

    /**
     * Resizing Pie Chart matching the height of bar chart
     */
    // let divHeightPie = $('#statusPieChart').height();
    // let divHeightBar = $('#statusStackedBarChart').height();
    // $('#statusPieChart').css('margin-bottom', divHeightBar - divHeightPie);
  }

  function generateCategoriesInLocationsBarChart(id, data) {
    let barChartCanvas = $(`#${id}`).get(0).getContext("2d");
    let barChart = new Chart(barChartCanvas);
    let ctx = document.getElementById(id);
    let barOptions = (graphData => { return {
      maintainAspectRatio: false,
      aspectRatio: 0.5,
      responsive: true,
      layout: {
        padding: {
          top: 50,
          bottom: 0,
          left: 0,
          right: 0
        },
      },
      scales: {
        xAxes: [{
          display: true,
          stacked: true,
          scaleLabel: {
            display: true,
            labelString: 'Location'
          }
        }],
        yAxes: [{
          display: true,
          stacked: true,
          scaleLabel: {
            display: true,
            labelString: 'Asset Count'
          },
          ticks: {
            // min: graphData.limits.min,
            // max: graphData.limits.max,
            stepSize: 50,
          },
          beforeBuildTicks: function(axis) {
          }
        }]
      },
      legend: {
        display: false,
        position: 'left',
        responsive: true,
        labels: {
          generateLabels: function(chart) {
            let data = chart.data;
            if (Object.keys(data.categoriesColors).length && data.datasets.length) {
              return Object.keys(data.categoriesColors).map(function(key) {
                return {
                  text: key,
                  fillStyle: data.categoriesColors[key] || '#000',
                };
              });
            }
            return [];
          },
          font: {
            size: 1, // Reduce the font size
          },
          boxWidth: 10, // Reduce the box width
        }
      },
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            let dataset = data.datasets[tooltipItem.datasetIndex];
            let location = data.labels[tooltipItem.index];
            let categoryName = dataset.label;
            let total = dataset.data[tooltipItem.index];
            let status = dataset.status[location] // dataset.status[tooltipItem.index];
            let statusArr = Object.keys(status).map((key) => ` ${key}: ${status[key]}`)

            // console.log(location, modelName, total, status, tooltipItem.datasetIndex, data)

            return `${categoryName} - ${location}: ${total} -${statusArr}`;
          }
        }
      }
    }});

    function buildDataset(data) {
      let colorMap = {};
      let categories = data.category_names
      let locations = data.location_names
      let colors = generateColors(categories.length)
      categories.forEach((category, index) => { colorMap[category] = colors[index];});

      let datasets = categories.map((category, index) => {
        let extraDataObj = {};

        if(data.assets_by_category[category] && data.assets_by_category[category].locations) {
          Object.keys(data.assets_by_category[category].locations).forEach(location => {
            let target = data?.assets_by_category[category]?.locations[location]
            extraDataObj[location] = target
          })
        }

        return {
          label: category,
          extraData: extraDataObj,
          backgroundColor: colorMap[category],
          stack: `Stack ${index}`
        }
      }).map((obj, index) => {
        let statusArr = {};
        return {
          barPercentage: 0.7,
          barAspectRation: 0.2,
          label: obj.label,
          data: locations.map(location => {
            if(obj.extraData.hasOwnProperty(location)) {
              let categoryInLocation = obj.extraData[location]
              statusArr[location] = {Total: categoryInLocation.count, ...categoryInLocation.status}
              return categoryInLocation.count
            } else {
              return 0
            }
          }),
          status: statusArr,
          backgroundColor: obj.backgroundColor,
          hoverBackgroundColor: obj.backgroundColor,
          stack: `Stack 0`
        }
      })

      let max = datasets.reduce((acc, row) => {
        let rowMax = Math.max(...row.data);
        return Math.max(acc, rowMax);
      }, Number.NEGATIVE_INFINITY);

      let min = datasets.reduce((acc, row) => {
        let rowMax = Math.min(...row.data);
        return Math.min(acc, rowMax);
      }, Number.POSITIVE_INFINITY);

      let graphData = {
        limits: { max, min },
        labels: locations,
        categoriesColors: colorMap,
        datasets: [...datasets]
      }

      return graphData
    }

    let graphData = buildDataset(data)
    let myBarChart = new Chart(ctx,{
      type   : 'bar',
      data   : graphData,
      options: barOptions(graphData)
    });

    let last = document.getElementById(id).clientWidth;
    addEventListener('resize', function() {
      let current = document.getElementById(id).clientWidth;
      if (current != last) location.reload();
      last = current;
    });

    /**
     * Resizing Pie Chart matching the height of bar chart
     */
    // let divHeightPie = $('#statusPieChart').height();
    // let divHeightBar = $('#statusStackedBarChart').height();
    // $('#statusPieChart').css('margin-bottom', divHeightBar - divHeightPie);
  }

  function generatePurchasesByDatesGraph(id, data) {
    let labels = data.assets_by_purchase_date.map(item => item.date);
    let dataPoints = data.assets_by_purchase_date.map(item => item.count);

    let ctx = document.getElementById(id).getContext('2d');
    let purchasesChart = new Chart(ctx, {
        type: 'line', // You can change this to 'bar' or 'line' or any other type
        data: {
            labels: labels, // Dates
            datasets: [{
                label: 'Number of Purchases',
                data: dataPoints, // Number of purchases
                fill: true,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            aspectRatio: 0.7,
            scales: {
                xAxes: {
                    type: 'time',
                    time: {
                        unit: 'day'
                    },
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                yAxes: [{
                    ticks: {
                      // stepSize: 10,
                    },
                    title: {
                        display: true,
                        text: 'Number of Purchases'
                    }
                }]
            }
        }
    });
  }

  function generatePieChart(id) {
    let pieChartCanvas = $(`#${id}`).get(0).getContext("2d");
    let pieChart = new Chart(pieChartCanvas);
    let ctx = document.getElementById(id);
    let pieOptions = {
            legend: {
                position: 'top',
                responsive: true,
                maintainAspectRatio: true,
            },
            tooltips: {
              callbacks: {
                  label: function(tooltipItem, data) {
                      counts = data.datasets[0].data;
                      total = 0;
                      for(let i in counts) {
                          total += counts[i];
                      }
                      prefix = data.labels[tooltipItem.index] || '';
                      return prefix+" "+Math.round(counts[tooltipItem.index]/total*100)+"%";
                  }
              }
            }
        };

    $.ajax({
        type: 'GET',
        url: '{{ (\App\Models\Setting::getSettings()->dash_chart_type == 'name') ? route('api.statuslabels.assets.byname') : route('api.statuslabels.assets.bytype') }}',
        headers: {
            "X-Requested-With": 'XMLHttpRequest',
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        success: function (data) {
            let myPieChart = new Chart(ctx,{
                type   : 'pie',
                data   : data,
                options: pieOptions
            });
        },
        error: function (data) {
            // window.location.reload(true);
        },
    });
      let last = document.getElementById(id).clientWidth;
      addEventListener('resize', function() {
        let current = document.getElementById(id).clientWidth;
        if (current != last) location.reload();
        last = current;
      });
  }

//   function hslToHex(h, s, l) {
//     s /= 100;
//     l /= 100;

//     let c = (1 - Math.abs(2 * l - 1)) * s;
//     let x = c * (1 - Math.abs((h / 60) % 2 - 1));
//     let m = l - c / 2;
//     let r = 0, g = 0, b = 0;

//     if (0 <= h && h < 60) {
//         r = c; g = x; b = 0;
//     } else if (60 <= h && h < 120) {
//         r = x; g = c; b = 0;
//     } else if (120 <= h && h < 180) {
//         r = 0; g = c; b = x;
//     } else if (180 <= h && h < 240) {
//         r = 0; g = x; b = c;
//     } else if (240 <= h && h < 300) {
//         r = x; g = 0; b = c;
//     } else if (300 <= h && h < 360) {
//         r = c; g = 0; b = x;
//     }

//     r = Math.round((r + m) * 255);
//     g = Math.round((g + m) * 255);
//     b = Math.round((b + m) * 255);

//     return `#${((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1).toUpperCase()}`;
// }

  // function generateColors(count) {
  //   const colors = [];
  //   const step = Math.floor(1440 / count); // Determine the step size for the hue

  //   for (let i = 0; i < count; i++) {
  //       const hue = i * step;
  //       const color = `hsl(${hue}, 60%, 55%)`;
  //       colors.push(color);
  //   }

  //   return colors;
  // }

  function generateColors(count) {
    const colors = [];
    const hueStep = 360 / count; // Step size for hue
    const saturationValues = [60, 70, 80]; // Different saturation levels
    const lightnessValues = [50, 60, 70]; // Different lightness levels

    for (let i = 0; i < count; i++) {
        const hue = (i * hueStep) % 360;
        const saturation = saturationValues[i % saturationValues.length];
        const lightness = lightnessValues[i % lightnessValues.length];
        const color = `hsl(${hue}, ${saturation}%, ${lightness}%)`;
        colors.push(color);
    }

    return colors;
  }

  function generateAcronym(phrase) {
    if(typeof phrase !== "string") {
      return phrase;
    }

    const words = phrase.split(' ');

    if (words.length === 1) {
        // If there's only one word, return it in uppercase
        return phrase
    }
    else {
        // If there are multiple words, generate an acronym
        return words
            .map(word => {
              if(word[0])
                return word[0].toUpperCase()
            }).join('');
    }


    return phrase
  }


</script>
@endpush
