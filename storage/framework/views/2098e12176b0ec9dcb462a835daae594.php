<?php $__env->startSection('title'); ?> <?php echo e(__($module_action)); ?> <?php echo e(__($module_title)); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card-main mb-5">
            <?php if (isset($component)) { $__componentOriginal57a22d33ea7984d606412297cfe33b67 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal57a22d33ea7984d606412297cfe33b67 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.section-header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backend.section-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="d-flex flex-wrap gap-3">
                    <?php if (isset($component)) { $__componentOriginal9c2603df095322fce98f15251ab0847f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c2603df095322fce98f15251ab0847f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.quick-action','data' => ['url' => ''.e(route('backend.entertainments.bulk_action')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backend.quick-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route('backend.entertainments.bulk_action')).'']); ?>
                        <div class="">
                            <select name="action_type" class="form-control select2 col-12" id="quick-action-type"
                                style="width:100%">
                                <option value=""><?php echo e(__('messages.no_action')); ?></option>

                                <option value="change-status"><?php echo e(__('messages.lbl_status')); ?></option>
                                <?php if(Auth::user()->can('delete_movies')): ?>
                                <option value="delete"><?php echo e(__('messages.delete')); ?></option>
                                <?php endif; ?>
                                <?php if(Auth::user()->can('restore_movies')): ?>
                                <option value="restore"><?php echo e(__('messages.restore')); ?></option>
                                <?php endif; ?>
                                <?php if(Auth::user()->can('force_delete_movies')): ?>
                                <option value="permanently-delete"><?php echo e(__('messages.permanent_dlt')); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="select-status d-none quick-action-field" id="change-status-action">
                            <select name="status" class="form-control select2" id="status" style="width:100%">
                                <option value="1" selected><?php echo e(__('messages.active')); ?></option>
                                <option value="0"><?php echo e(__('messages.inactive')); ?></option>
                            </select>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c2603df095322fce98f15251ab0847f)): ?>
<?php $attributes = $__attributesOriginal9c2603df095322fce98f15251ab0847f; ?>
<?php unset($__attributesOriginal9c2603df095322fce98f15251ab0847f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c2603df095322fce98f15251ab0847f)): ?>
<?php $component = $__componentOriginal9c2603df095322fce98f15251ab0847f; ?>
<?php unset($__componentOriginal9c2603df095322fce98f15251ab0847f); ?>
<?php endif; ?>



                      <button type="button" class="btn btn-dark" data-modal="export">
                        <i class="ph ph-export align-middle"></i> <?php echo e(__('messages.export')); ?>

                      </button>
                </div>

                 <?php $__env->slot('toolbar', null, []); ?> 

                    <div>
                        <div class="datatable-filter">
                            <select name="column_status" id="column_status" class="select2 form-control"
                                data-filter="select" style="width: 100%">
                                <option value=""><?php echo e(__('messages.all')); ?></option>
                                <option value="0" <?php echo e($filter['status'] == '0' ? 'selected' : ''); ?>>
                                    <?php echo e(__('messages.inactive')); ?></option>
                                <option value="1" <?php echo e($filter['status'] == '1' ? 'selected' : ''); ?>>
                                    <?php echo e(__('messages.active')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text pe-0" id="addon-wrapping"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                       <input type="text" id="movie_name" class="form-control dt-search" placeholder="<?php echo e(__('placeholder.lbl_search')); ?>" aria-label="Search" aria-describedby="addon-wrapping">

                    </div>
                    <button class="btn btn-dark d-flex align-items-center gap-1 btn-group" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="ph ph-funnel"></i><?php echo e(__('messages.advance_filter')); ?></button>
                    <?php if(Auth::user()->can('add_movies')): ?>
                     <a href="<?php echo e(route('backend.movies.create')); ?>" class="btn btn-primary d-flex align-items-center gap-1" id="add-post-button"> <i class="ph ph-plus-circle"></i> <?php echo e(__('messages.new')); ?></a>
                     <?php endif; ?>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal57a22d33ea7984d606412297cfe33b67)): ?>
<?php $attributes = $__attributesOriginal57a22d33ea7984d606412297cfe33b67; ?>
<?php unset($__attributesOriginal57a22d33ea7984d606412297cfe33b67); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal57a22d33ea7984d606412297cfe33b67)): ?>
<?php $component = $__componentOriginal57a22d33ea7984d606412297cfe33b67; ?>
<?php unset($__componentOriginal57a22d33ea7984d606412297cfe33b67); ?>
<?php endif; ?>
            <table id="datatable" class="table table-responsive">
            </table>
    </div>
    <?php if (isset($component)) { $__componentOriginalda1c96c62b8380f4858a938b2701631b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda1c96c62b8380f4858a938b2701631b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.advance-filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backend.advance-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('title', null, []); ?> 
            <h4 class="mb-0"><?php echo e(__('messages.advance_filter')); ?></h4>
         <?php $__env->endSlot(); ?>

            <div class="form-group">

                <div class="form-group datatable-filter">
                  <input type="hidden" class="form-control" name ="type" id="type" value="moive"></input>
                </div>

              <div class="form-group datatable-filter">
                <label class="form-label" for="gener"><?php echo e(__('movie.lbl_genres')); ?></label>
                <select name="gener" id="gener" class="form-control select2" data-filter="select">
                    <option value=""><?php echo e(__('messages.all')); ?> </option>
                    <?php $__currentLoopData = $geners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gener): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($gener->id); ?>"><?php echo e($gener->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group datatable-filter">
                <label class="form-label" for="language"><?php echo e(__('movie.lbl_movie_language')); ?></label>
                <select name="language" id="language" class="form-control select2" data-filter="select">
                    <option value=""><?php echo e(__('messages.all')); ?> </option>
                    <?php $__currentLoopData = $movie_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($language->value); ?>"><?php echo e($language->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group datatable-filter">
                <?php echo e(html()->label(__('movie.lbl_movie_access') , 'movie_access')->class('form-label')); ?>

                <div class="d-flex align-items-center">
                    <label class="form-check form-check-inline form-control ps-5 cursor-pointer">
                        <input class="form-check-input" type="radio" name="movie_access" id="paid" value="paid"
                            onchange="showPlanSelection(this.value === 'paid')"
                            <?php echo e(old('movie_access') == 'paid' ? 'checked' : ''); ?> >
                        <label class="form-check-label" for="paid"><?php echo e(__('movie.lbl_paid')); ?></label>
                    </label>
                    <label class="form-check form-check-inline form-control ps-5 cursor-pointer">
                        <input class="form-check-input" type="radio" name="movie_access" id="free" value="free"
                            onchange="showPlanSelection(this.value === 'paid')"
                            <?php echo e(old('movie_access') == 'free' ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="free"><?php echo e(__('movie.lbl_free')); ?></label>
                    </label>
                </div>

                <?php $__errorArgs = ['movie_access'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <div class="form-group datatable-filter d-none" id="planSelection">
            <div  class="form-group datatable-filter">
                <label class="form-label" for="plan_id"><?php echo e(__('movie.lbl_select_plan')); ?></label>
                <select name="plan_id" id="plan_id" class="form-control select2" data-filter="select">
                    <option value=""><?php echo e(__('movie.all')); ?> <?php echo e(__('movie.lbl_select_plan')); ?></option>
                    <?php $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>


          </div>

        <div class="text-end">
        <button type="reset" class="btn btn-dark" id="reset-filter"><?php echo e(__('messages.reset')); ?></button>
        </div>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda1c96c62b8380f4858a938b2701631b)): ?>
<?php $attributes = $__attributesOriginalda1c96c62b8380f4858a938b2701631b; ?>
<?php unset($__attributesOriginalda1c96c62b8380f4858a938b2701631b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda1c96c62b8380f4858a938b2701631b)): ?>
<?php $component = $__componentOriginalda1c96c62b8380f4858a938b2701631b; ?>
<?php unset($__componentOriginalda1c96c62b8380f4858a938b2701631b); ?>
<?php endif; ?>
    <?php if(session('success')): ?>
        <div class="snackbar" id="snackbar">
            <div class="d-flex justify-content-around align-items-center">
                <p class="mb-0"><?php echo e(session('success')); ?></p>
                <a href="#" class="dismiss-link text-decoration-none text-success" onclick="dismissSnackbar(event)"><?php echo e(__('messages.dismiss')); ?></a>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-styles'); ?>
<!-- DataTables Core and Extensions -->
<link rel="stylesheet" href="<?php echo e(asset('vendor/datatable/datatables.min.css')); ?>">
<?php $__env->stopPush(); ?>
    <?php $__env->startPush('after-scripts'); ?>
    <!-- DataTables Core and Extensions -->
     <script src="<?php echo e(asset('js/form-modal/index.js')); ?>" defer></script>
     <script src="<?php echo e(asset('js/form/index.js')); ?>" defer></script>
<script type="text/javascript" src="<?php echo e(asset('vendor/datatable/datatables.min.js')); ?>"></script>
    <script type="text/javascript" defer>
        const columns = [
            {
                name: 'check',
                data: 'check',
                title: '<input type="checkbox" class="form-check-input" name="select_all_table" id="select-all-table" data-type="entertainment" onclick="selectAllTable(this)">',
                width: '0%',
                exportable: false,
                orderable: false,
                searchable: false,
            },
            { data: 'thumbnail_url',
              name: 'thumbnail_url',
              title: "<?php echo e(__('movie.movie')); ?>",
              orderable: false,
              searchable: true,
             },
             {
                data: 'like_count',
                name: 'like_count',
                title: "<?php echo e(__('movie.likes')); ?>",

            },
            {
                data: 'watch_count', // New column for TV Category
                name: 'watch_count', // Corresponding name on the server-side
                title: "<?php echo e(__('movie.watch')); ?>", // Add localization key for TV Category

            },
           {
            data: 'movie_access',
             name: 'movie_access',
             title: "<?php echo e(__('movie.access')); ?>",
             render: function (data, type, row) {
                 let capitalizedData = data.charAt(0).toUpperCase() + data.slice(1);
                 let className = data == 'free' ? 'badge bg-info-subtle p-2' : 'badge bg-success-subtle p-2';
                 return '<span class="' + className + '">' + capitalizedData + '</span>';
             }
           },
            {
                data: 'plan_id',
                name: 'plan_id',
                title: "<?php echo e(__('movie.plan')); ?>",

            },
            {
               data: 'language',
               name: 'language',
               title: "<?php echo e(__('movie.language')); ?>",
               render: function (data, type, row) {
                   return data.charAt(0).toUpperCase() + data.slice(1);
               }
           },

            {
                data: 'status',
                name: 'status',
                title: "<?php echo e(__('messages.lbl_status')); ?>",
                width: '5%',
            },

            {
                data: 'is_restricted',
                name: 'is_restricted',
                title: "<?php echo e(__('movie.lbl_restricted_content')); ?>",
                width: '5%',
            },
            {
              data: 'updated_at',
              name: 'updated_at',
              title: "<?php echo e(__('messages.updated_at')); ?>",
              orderable: true,
             visible: false,
           },

        ]


        const actionColumn = [{
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            title: "<?php echo e(__('messages.action')); ?>",
            width: '5%'
        }]

        let finalColumns = [
            ...columns,
            ...actionColumn
        ]

        document.addEventListener('DOMContentLoaded', (event) => {

            selectedaccess=null;

            $('input[name="movie_access"]').change(function() {
               selectedaccess = $(this).val();

               window.renderedDataTable.ajax.reload(null, false);
           });

           $('#movie_name').on('input', function() {
    window.renderedDataTable.ajax.reload(null, false);
});
           $('#gener').on('select', function() {
               window.renderedDataTable.ajax.reload(null, false);
           });

           $('#language').on('select', function() {
               window.renderedDataTable.ajax.reload(null, false);
            });

           $('#plan_id').on('select', function() {

               window.renderedDataTable.ajax.reload(null, false);
           });

            initDatatable({
                url: '<?php echo e(route("backend.$module_name.index_data")); ?>',
                finalColumns,
                orderColumn: [[ 9, "desc" ]],
                advanceFilter: () => {
    return {
        type: $('#type').val(),
        movie_name: $('#movie_name').val(),
        language: $('#language').val(),
        gener: $('#gener').val(),
        movie_access: selectedaccess,
        plan_id: $('#plan_id').val(),
    }
}
            });
        })

        $('#reset-filter').on('click', function(e) {
            $('#moive_name').val(''),
            $('#language').val(''),
            $('#gener').val(''),
            $('#movie_access').val(''),
            $('#plan_id').val(''),

            $('input[name="movie_access"]').prop('checked', false);
            selectedaccess = null;
            window.renderedDataTable.ajax.reload(null, false)
        })
        function resetQuickAction () {
        const actionValue = $('#quick-action-type').val();
        if (actionValue != '') {
            $('#quick-action-apply').removeAttr('disabled');

            if (actionValue == 'change-status') {
                $('.quick-action-field').addClass('d-none');
                $('#change-status-action').removeClass('d-none');
            } else {
                $('.quick-action-field').addClass('d-none');
            }
        } else {
            $('#quick-action-apply').attr('disabled', true);
            $('.quick-action-field').addClass('d-none');
        }
      }

      $('#quick-action-type').change(function () {
        resetQuickAction()
      });

      $(document).on('update_quick_action', function() {
        // resetActionButtons()
      })

        function showPlanSelection(isPaid) {
        const planSelectionDiv = document.getElementById('planSelection');
        const planIdSelect = document.getElementById('plan_id');

        if (isPaid) {
            planSelectionDiv.classList.remove('d-none');
        } else {
            planSelectionDiv.classList.add('d-none');
            planIdSelect.value = '';
        }
    }
        document.addEventListener('DOMContentLoaded', function() {
            var movieAccessPaid = document.getElementById('paid');
            if (movieAccessPaid.checked) {
                showPlanSelection(true);
            }
        });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Entertainment/Resources/views/backend/movie/index.blade.php ENDPATH**/ ?>