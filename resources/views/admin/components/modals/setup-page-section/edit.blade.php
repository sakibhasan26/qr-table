@if (admin_permission_by_name("admin.setup.pages.update.section"))
    <div id="edit-section" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title">{{ __("Edit Currency") }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('admin.setup.pages.update.section') }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    @include('admin.components.form.hidden-input',[
                        'name'          => 'target',
                        'value'         => old('target'),
                    ])
                    <div class="row mb-10-none">
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label>{{ __("Section*") }}</label>
                            <select name="edit_section" class="form--control select2-basic">
                                <option selected disabled>{{ __("Select Section") }}</option>
                                @foreach ($site_sections ?? [] as $item)
                                    <option value="{{ $item->key }}">{{ Str::title(str_replace(['_', '-'], ' ', $item->key)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            @include('admin.components.form.input',[
                                'label'         => __('Position').'*',
                                'name'          => 'edit_position',
                                'value'         => __("Enter Position"),
                                'value'         => old('edit_position')
                            ])
                        </div>

                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn btn--danger modal-close">{{ __("Cancel") }}</button>
                            <button type="submit" class="btn btn--base">{{ __("Update") }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push("script")
        <script>
            openModalWhenError("edit-section","#edit-section");
            $(".edit-modal-button").click(function(){
                var oldData = JSON.parse($(this).parents("tr").attr("data-item"));

                var editModal = $("#edit-section");
                editModal.find("form").first().find("input[name=target]").val(oldData.id);
                editModal.find("input[name=edit_position]").val(oldData.position);

                editModal.find("select[name=edit_section] option").each(function() {
                    if ($(this).val() === oldData.section) {
                        $(this).prop('selected', true);
                    }
                });
                editModal.find("select[name=edit_section]").trigger('change');

                openModalBySelector("#edit-section");
            });

        </script>
    @endpush
@endif
