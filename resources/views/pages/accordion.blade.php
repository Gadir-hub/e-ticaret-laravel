@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Accordion - Midone - Tailwind Admin Dashboard Template</title>
@endsection

@section('subcontent')
    <div class="intro-y mt-8 flex items-center">
        <h2 class="mr-auto text-lg font-medium">Accordion</h2>
    </div>
    <div class="intro-y mt-5 grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-6">
            <!-- BEGIN: Basic Accordion -->
            
                <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Basic Accordion
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
                    
                        
                            <x-base.disclosure
                                id="faq-accordion-1"
                                :index="0"
                            >
                                
                                    OpenSSL Essentials: Working with SSL Certificates,
                                    Private Keys
                                </x-base.disclosure.button>
                                
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap
                                    into electronic typesetting, remaining essentially
                                    unchanged.
                                </x-base.disclosure.panel>
                            </x-base.disclosure>
                            <x-base.disclosure
                                id="faq-accordion-2"
                                :index="1"
                            >
                                
                                    Understanding IP Addresses, Subnets, and CIDR Notation
                                </x-base.disclosure.button>
                                
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap
                                    into electronic typesetting, remaining essentially
                                    unchanged.
                                </x-base.disclosure.panel>
                            </x-base.disclosure>
                            <x-base.disclosure
                                id="faq-accordion-3"
                                :index="2"
                            >
                                
                                    How To Troubleshoot Common HTTP Error Codes
                                </x-base.disclosure.button>
                                
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap
                                    into electronic typesetting, remaining essentially
                                    unchanged.
                                </x-base.disclosure.panel>
                            </x-base.disclosure>
                            <x-base.disclosure
                                id="faq-accordion-4"
                                :index="3"
                            >
                                
                                    An Introduction to Securing your Linux VPS
                                </x-base.disclosure.button>
                                
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap
                                    into electronic typesetting, remaining essentially
                                    unchanged.
                                </x-base.disclosure.panel>
                            </x-base.disclosure>
                        </x-base.disclosure.group>
                    </x-base.preview>
                    
                        
                            
                                <x-base.disclosure
                                    id="faq-accordion-1"
                                    :index="0"
                                >
                                    
                                        OpenSSL Essentials: Working with SSL Certificates,
                                        Private Keys
                                    </x-base.disclosure.button>
                                    
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. It has
                                        survived not only five centuries, but also the leap
                                        into electronic typesetting, remaining essentially
                                        unchanged.
                                    </x-base.disclosure.panel>
                                </x-base.disclosure>
                                <x-base.disclosure
                                    id="faq-accordion-2"
                                    :index="1"
                                >
                                    
                                        Understanding IP Addresses, Subnets, and CIDR Notation
                                    </x-base.disclosure.button>
                                    
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. It has
                                        survived not only five centuries, but also the leap
                                        into electronic typesetting, remaining essentially
                                        unchanged.
                                    </x-base.disclosure.panel>
                                </x-base.disclosure>
                                <x-base.disclosure
                                    id="faq-accordion-3"
                                    :index="2"
                                >
                                    
                                        How To Troubleshoot Common HTTP Error Codes
                                    </x-base.disclosure.button>
                                    
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. It has
                                        survived not only five centuries, but also the leap
                                        into electronic typesetting, remaining essentially
                                        unchanged.
                                    </x-base.disclosure.panel>
                                </x-base.disclosure>
                                <x-base.disclosure
                                    id="faq-accordion-4"
                                    :index="3"
                                >
                                    
                                        An Introduction to Securing your Linux VPS
                                    </x-base.disclosure.button>
                                    
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. It has
                                        survived not only five centuries, but also the leap
                                        into electronic typesetting, remaining essentially
                                        unchanged.
                                    </x-base.disclosure.panel>
                                </x-base.disclosure>
                            </x-base.disclosure.group>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Basic Accordion -->
            <!-- BEGIN: Boxed Accordion -->
            
                <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Boxed Accordion
                    </h2>
                    
                        
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
                    
                        
                            <x-base.disclosure
                                id="faq-accordion-5"
                                :index="0"
                            >
                                
                                    OpenSSL Essentials: Working with SSL Certificates,
                                    Private Keys
                                </x-base.disclosure.button>
                                
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap
                                    into electronic typesetting, remaining essentially
                                    unchanged.
                                </x-base.disclosure.panel>
                            </x-base.disclosure>
                            <x-base.disclosure
                                id="faq-accordion-6"
                                :index="1"
                            >
                                
                                    Understanding IP Addresses, Subnets, and CIDR Notation
                                </x-base.disclosure.button>
                                
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap
                                    into electronic typesetting, remaining essentially
                                    unchanged.
                                </x-base.disclosure.panel>
                            </x-base.disclosure>
                            <x-base.disclosure
                                id="faq-accordion-7"
                                :index="2"
                            >
                                
                                    How To Troubleshoot Common HTTP Error Codes
                                </x-base.disclosure.button>
                                
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap
                                    into electronic typesetting, remaining essentially
                                    unchanged.
                                </x-base.disclosure.panel>
                            </x-base.disclosure>
                            <x-base.disclosure
                                id="faq-accordion-8"
                                :index="3"
                            >
                                
                                    An Introduction to Securing your Linux VPS
                                </x-base.disclosure.button>
                                
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap
                                    into electronic typesetting, remaining essentially
                                    unchanged.
                                </x-base.disclosure.panel>
                            </x-base.disclosure>
                        </x-base.disclosure.group>
                    </x-base.preview>
                    
                        
                            
                                <x-base.disclosure
                                    id="faq-accordion-5"
                                    :index="0"
                                >
                                    
                                        OpenSSL Essentials: Working with SSL Certificates,
                                        Private Keys
                                    </x-base.disclosure.button>
                                    
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. It has
                                        survived not only five centuries, but also the leap
                                        into electronic typesetting, remaining essentially
                                        unchanged.
                                    </x-base.disclosure.panel>
                                </x-base.disclosure>
                                <x-base.disclosure
                                    id="faq-accordion-6"
                                    :index="1"
                                >
                                    
                                        Understanding IP Addresses, Subnets, and CIDR Notation
                                    </x-base.disclosure.button>
                                    
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. It has
                                        survived not only five centuries, but also the leap
                                        into electronic typesetting, remaining essentially
                                        unchanged.
                                    </x-base.disclosure.panel>
                                </x-base.disclosure>
                                <x-base.disclosure
                                    id="faq-accordion-7"
                                    :index="2"
                                >
                                    
                                        How To Troubleshoot Common HTTP Error Codes
                                    </x-base.disclosure.button>
                                    
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. It has
                                        survived not only five centuries, but also the leap
                                        into electronic typesetting, remaining essentially
                                        unchanged.
                                    </x-base.disclosure.panel>
                                </x-base.disclosure>
                                <x-base.disclosure
                                    id="faq-accordion-8"
                                    :index="3"
                                >
                                    
                                        An Introduction to Securing your Linux VPS
                                    </x-base.disclosure.button>
                                    
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. It has
                                        survived not only five centuries, but also the leap
                                        into electronic typesetting, remaining essentially
                                        unchanged.
                                    </x-base.disclosure.panel>
                                </x-base.disclosure>
                            </x-base.disclosure.group>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Boxed Accordion -->
        </div>
    </div>
@endsection
