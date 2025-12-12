@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Datepicker - Midone - Tailwind Admin Dashboard Template</title>
@endsection

@section('subcontent')
    <div class="intro-y mt-8 flex items-center">
        <h2 class="mr-auto text-lg font-medium">Datepicker</h2>
    </div>
    <div class="intro-y mt-5 grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-6">
            <!-- BEGIN: Basic Datepicker -->
            
                <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Basic Date Picker
                    </h2>
                    
                        
                            Show example code
                        </x-base.form-switch.label>
                        <x-base.form-switch.input
                            class="ml-3 mr-0"
                            id="show-example-1"
                            type="checkbox"
                        />
                    </x-base.form-switch>
                </div>
                <div class="p-5">
                    
                        <x-base.litepicker
                            class="mx-auto block w-56"
                            data-single-mode="true"
                        />
                    </x-base.preview>
                    
                        
                            <x-base.litepicker
                                class="mx-auto block w-56"
                                data-single-mode="true"
                            />
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Basic Datepicker -->
            <!-- BEGIN: Input Group -->
            
                <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">Input Group</h2>
                    
                        
                            Show example code
                        </x-base.form-switch.label>
                        <x-base.form-switch.input
                            class="ml-3 mr-0"
                            id="show-example-2"
                            type="checkbox"
                        />
                    </x-base.form-switch>
                </div>
                <div class="p-5">
                    
                        <div class="relative mx-auto w-56">
                            <div
                                class="absolute flex h-full w-10 items-center justify-center rounded-l border bg-slate-100 text-slate-500 dark:border-darkmode-800 dark:bg-darkmode-700 dark:text-slate-400">
                                <x-base.lucide
                                    class="h-4 w-4"
                                    icon="Calendar"
                                />
                            </div>
                            <x-base.litepicker
                                class="pl-12"
                                data-single-mode="true"
                            />
                        </div>
                    </x-base.preview>
                    
                        
                            <div class="relative mx-auto w-56">
                                <div
                                    class="absolute flex h-full w-10 items-center justify-center rounded-l border bg-slate-100 text-slate-500 dark:border-darkmode-800 dark:bg-darkmode-700 dark:text-slate-400">
                                    <x-base.lucide
                                        class="h-4 w-4"
                                        icon="Calendar"
                                    />
                                </div>
                                <x-base.litepicker
                                    class="pl-12"
                                    data-single-mode="true"
                                />
                            </div>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Input Group -->
        </div>
        <div class="col-span-12 lg:col-span-6">
            <!-- BEGIN: Daterange Picker -->
            
                <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Date Range Picker
                    </h2>
                    
                        
                            Show example code
                        </x-base.form-switch.label>
                        <x-base.form-switch.input
                            class="ml-3 mr-0"
                            id="show-example-3"
                            type="checkbox"
                        />
                    </x-base.form-switch>
                </div>
                <div class="p-5">
                    
                        
                    </x-base.preview>
                    
                        
                            
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Daterange Picker -->
            <!-- BEGIN: Modal Datepicker -->
            
                <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Modal Date Picker
                    </h2>
                    
                        
                            Show example code
                        </x-base.form-switch.label>
                        <x-base.form-switch.input
                            class="ml-3 mr-0"
                            id="show-example-4"
                            type="checkbox"
                        />
                    </x-base.form-switch>
                </div>
                <div class="p-5">
                    
                        <!-- BEGIN: Show Modal Toggle -->
                        <div class="text-center">
                            <x-base.button
                                data-tw-toggle="modal"
                                data-tw-target="#datepicker-modal-preview"
                                href="#"
                                as="a"
                                variant="primary"
                            >
                                Show Modal
                            </x-base.button>
                        </div>
                        <!-- END: Show Modal Toggle -->
                        <!-- BEGIN: Modal Content -->
                        
                            
                                <!-- BEGIN: Modal Header -->
                                
                                    <h2 class="mr-auto text-base font-medium">
                                        Filter by Date
                                    </h2>
                                    <x-base.button
                                        class="hidden sm:flex"
                                        variant="outline-secondary"
                                    >
                                        <x-base.lucide
                                            class="mr-2 h-4 w-4"
                                            icon="File"
                                        />
                                        Download Docs
                                    </x-base.button>
                                    
                                        <x-base.menu.button
                                            class="block h-5 w-5"
                                            href="#"
                                            as="a"
                                        >
                                            <x-base.lucide
                                                class="h-5 w-5 text-slate-500"
                                                icon="MoreHorizontal"
                                            />
                                        </x-base.menu.button>
                                        
                                            
                                                <x-base.lucide
                                                    class="mr-2 h-4 w-4"
                                                    icon="File"
                                                />
                                                Download Docs
                                            </x-base.menu.item>
                                        </x-base.menu.items>
                                    </x-base.menu>
                                </x-base.dialog.title>
                                <!-- END: Modal Header -->
                                <!-- BEGIN: Modal Body -->
                                
                                    <div class="col-span-12 sm:col-span-6">
                                        
                                            From
                                        </x-base.form-label>
                                        <x-base.litepicker
                                            id="modal-datepicker-1"
                                            data-single-mode="true"
                                        />
                                    </div>
                                    <div class="col-span-12 sm:col-span-6">
                                        
                                            To
                                        </x-base.form-label>
                                        <x-base.litepicker
                                            id="modal-datepicker-2"
                                            data-single-mode="true"
                                        />
                                    </div>
                                </x-base.dialog.description>
                                <!-- END: Modal Body -->
                                <!-- BEGIN: Modal Footer -->
                                
                                    <x-base.button
                                        class="mr-1 w-20"
                                        data-tw-dismiss="modal"
                                        type="button"
                                        variant="outline-secondary"
                                    >
                                        Cancel
                                    </x-base.button>
                                    <x-base.button
                                        class="w-20"
                                        type="button"
                                        variant="primary"
                                    >
                                        Submit
                                    </x-base.button>
                                </x-base.dialog.footer>
                                <!-- END: Modal Footer -->
                            </x-base.dialog.panel>
                        </x-base.dialog>
                        <!-- END: Modal Content -->
                    </x-base.preview>
                    
                        
                            <!-- BEGIN: Show Modal Toggle -->
                            <div class="text-center">
                                <x-base.button
                                    data-tw-toggle="modal"
                                    data-tw-target="#datepicker-modal-preview"
                                    href="#"
                                    as="a"
                                    variant="primary"
                                >
                                    Show Modal
                                </x-base.button>
                            </div>
                            <!-- END: Show Modal Toggle -->
                            <!-- BEGIN: Modal Content -->
                            
                                
                                    <!-- BEGIN: Modal Header -->
                                    
                                        <h2 class="mr-auto text-base font-medium">
                                            Filter by Date
                                        </h2>
                                        <x-base.button
                                            class="hidden sm:flex"
                                            variant="outline-secondary"
                                        >
                                            <x-base.lucide
                                                class="mr-2 h-4 w-4"
                                                icon="File"
                                            />
                                            Download Docs
                                        </x-base.button>
                                        
                                            <x-base.menu.button
                                                class="block h-5 w-5"
                                                href="#"
                                                as="a"
                                            >
                                                <x-base.lucide
                                                    class="h-5 w-5 text-slate-500"
                                                    icon="MoreHorizontal"
                                                />
                                            </x-base.menu.button>
                                            
                                                
                                                    <x-base.lucide
                                                        class="mr-2 h-4 w-4"
                                                        icon="File"
                                                    />
                                                    Download Docs
                                                </x-base.menu.item>
                                            </x-base.menu.items>
                                        </x-base.menu>
                                    </x-base.dialog.title>
                                    <!-- END: Modal Header -->
                                    <!-- BEGIN: Modal Body -->
                                    
                                        <div class="col-span-12 sm:col-span-6">
                                            
                                                From
                                            </x-base.form-label>
                                            <x-base.litepicker
                                                id="modal-datepicker-1"
                                                data-single-mode="true"
                                            />
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            
                                                To
                                            </x-base.form-label>
                                            <x-base.litepicker
                                                id="modal-datepicker-2"
                                                data-single-mode="true"
                                            />
                                        </div>
                                    </x-base.dialog.description>
                                    <!-- END: Modal Body -->
                                    <!-- BEGIN: Modal Footer -->
                                    
                                        <x-base.button
                                            class="mr-1 w-20"
                                            data-tw-dismiss="modal"
                                            type="button"
                                            variant="outline-secondary"
                                        >
                                            Cancel
                                        </x-base.button>
                                        <x-base.button
                                            class="w-20"
                                            type="button"
                                            variant="primary"
                                        >
                                            Submit
                                        </x-base.button>
                                    </x-base.dialog.footer>
                                    <!-- END: Modal Footer -->
                                </x-base.dialog.panel>
                            </x-base.dialog>
                            <!-- END: Modal Content -->
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Modal Datepicker -->
        </div>
    </div>
@endsection
