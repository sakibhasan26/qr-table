@if (admin_permission_by_name("admin.setup.pages.store.section"))
    <div id="add-section" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title">{{ __("Add Section") }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('admin.setup.pages.store.section',$setup_page->slug) }}">
                    @csrf
                    <div class="row mb-10-none">
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label>{{ __("Section*") }}</label>
                            <select name="section" class="form--control select2-basic">
                                <option selected disabled>{{ __("Select Section") }}</option>
                                @foreach ($site_sections ?? [] as $item)
                                    <option value="{{ $item->key }}">{{ Str::title(str_replace(['_', '-'], ' ', $item->key)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            @include('admin.components.form.input',[
                                'label'         => __('Position').'*',
                                'name'          => 'position',
                                'value'         => __("Enter Position"),
                                'value'         => old('position')
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn btn--danger modal-close">{{ __("Cancel") }}</button>
                            <button type="submit" class="btn btn--base">{{ __("Add") }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push("script")
        <script>
            $(document).ready(function(){
                openModalWhenError("add_section","#add-section");
            });
        </script>
    @endpush
@endif
