@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Regular Table - Midone - Tailwind Admin Dashboard Template</title>
@endsection

@section('subcontent')
    <div class="intro-y mt-8 flex items-center">
        <h2 class="mr-auto text-lg font-medium">Regular Table</h2>
    </div>
    <div class="mt-5 grid grid-cols-12 gap-6">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Basic Table -->
            
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">Basic Table</h2>
                    
                        
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
                    
                        <div class="overflow-x-auto">
                            
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        Angelina</x-base.table.td>
                                        Jolie</x-base.table.td>
                                        @angelinajolie</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        Brad</x-base.table.td>
                                        Pitt</x-base.table.td>
                                        @bradpitt</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        Charlie</x-base.table.td>
                                        Hunnam</x-base.table.td>
                                        @charliehunnam</x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                            <x-base.table
                                class="mt-5"
                                dark
                            >
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        Angelina</x-base.table.td>
                                        Jolie</x-base.table.td>
                                        @angelinajolie</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        Brad</x-base.table.td>
                                        Pitt</x-base.table.td>
                                        @bradpitt</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        Charlie</x-base.table.td>
                                        Hunnam</x-base.table.td>
                                        @charliehunnam</x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                    </x-base.preview>
                    
                        
                            <div class="overflow-x-auto">
                                
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            Angelina</x-base.table.td>
                                            Jolie</x-base.table.td>
                                            @angelinajolie</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            Brad</x-base.table.td>
                                            Pitt</x-base.table.td>
                                            @bradpitt</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            Charlie</x-base.table.td>
                                            Hunnam</x-base.table.td>
                                            @charliehunnam</x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                                <x-base.table
                                    class="mt-5"
                                    dark
                                >
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            Angelina</x-base.table.td>
                                            Jolie</x-base.table.td>
                                            @angelinajolie</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            Brad</x-base.table.td>
                                            Pitt</x-base.table.td>
                                            @bradpitt</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            Charlie</x-base.table.td>
                                            Hunnam</x-base.table.td>
                                            @charliehunnam</x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                            </div>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Basic Table -->
            <!-- BEGIN: Bordered Table -->
            
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Bordered Table
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
                    
                        <div class="overflow-x-auto">
                            
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        Angelina</x-base.table.td>
                                        Jolie</x-base.table.td>
                                        @angelinajolie</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        Brad</x-base.table.td>
                                        Pitt</x-base.table.td>
                                        @bradpitt</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        Charlie</x-base.table.td>
                                        Hunnam</x-base.table.td>
                                        @charliehunnam</x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                    </x-base.preview>
                    
                        
                            <div class="overflow-x-auto">
                                
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            Angelina</x-base.table.td>
                                            Jolie</x-base.table.td>
                                            @angelinajolie</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            Brad</x-base.table.td>
                                            Pitt</x-base.table.td>
                                            @bradpitt</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            Charlie</x-base.table.td>
                                            Hunnam</x-base.table.td>
                                            @charliehunnam</x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                            </div>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Bordered Table -->
            <!-- BEGIN: Hoverable Table -->
            
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Hoverable Table
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
                    
                        <div class="overflow-x-auto">
                            <x-base.table
                                bordered
                                hover
                            >
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        Angelina</x-base.table.td>
                                        Jolie</x-base.table.td>
                                        @angelinajolie</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        Brad</x-base.table.td>
                                        Pitt</x-base.table.td>
                                        @bradpitt</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        Charlie</x-base.table.td>
                                        Hunnam</x-base.table.td>
                                        @charliehunnam</x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                    </x-base.preview>
                    
                        
                            <div class="overflow-x-auto">
                                <x-base.table
                                    bordered
                                    hover
                                >
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            Angelina</x-base.table.td>
                                            Jolie</x-base.table.td>
                                            @angelinajolie</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            Brad</x-base.table.td>
                                            Pitt</x-base.table.td>
                                            @bradpitt</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            Charlie</x-base.table.td>
                                            Hunnam</x-base.table.td>
                                            @charliehunnam</x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                            </div>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Hoverable Table -->
            <!-- BEGIN: Table Row States -->
            
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Table Row States
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
                    
                        <div class="overflow-x-auto">
                            
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        Angelina</x-base.table.td>
                                        Jolie</x-base.table.td>
                                        @angelinajolie</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        Brad</x-base.table.td>
                                        Pitt</x-base.table.td>
                                        @bradpitt</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        Charlie</x-base.table.td>
                                        Hunnam</x-base.table.td>
                                        @charliehunnam</x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                    </x-base.preview>
                    
                        
                            <div class="overflow-x-auto">
                                
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            Angelina</x-base.table.td>
                                            Jolie</x-base.table.td>
                                            @angelinajolie</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            Brad</x-base.table.td>
                                            Pitt</x-base.table.td>
                                            @bradpitt</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            Charlie</x-base.table.td>
                                            Hunnam</x-base.table.td>
                                            @charliehunnam</x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                            </div>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Table Row States -->
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Table Head Options -->
            
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Table Head Options
                    </h2>
                    
                        
                            Show example code
                        </x-base.form-switch.label>
                        <x-base.form-switch.input
                            class="ml-3 mr-0"
                            id="show-example-5"
                            type="checkbox"
                        />
                    </x-base.form-switch>
                </div>
                <div class="p-5">
                    
                        <div class="overflow-x-auto">
                            
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        Angelina</x-base.table.td>
                                        Jolie</x-base.table.td>
                                        @angelinajolie</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        Brad</x-base.table.td>
                                        Pitt</x-base.table.td>
                                        @bradpitt</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        Charlie</x-base.table.td>
                                        Hunnam</x-base.table.td>
                                        @charliehunnam</x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                            
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        Angelina</x-base.table.td>
                                        Jolie</x-base.table.td>
                                        @angelinajolie</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        Brad</x-base.table.td>
                                        Pitt</x-base.table.td>
                                        @bradpitt</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        Charlie</x-base.table.td>
                                        Hunnam</x-base.table.td>
                                        @charliehunnam</x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                    </x-base.preview>
                    
                        
                            <div class="overflow-x-auto">
                                
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            Angelina</x-base.table.td>
                                            Jolie</x-base.table.td>
                                            @angelinajolie</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            Brad</x-base.table.td>
                                            Pitt</x-base.table.td>
                                            @bradpitt</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            Charlie</x-base.table.td>
                                            Hunnam</x-base.table.td>
                                            @charliehunnam</x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                                
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            Angelina</x-base.table.td>
                                            Jolie</x-base.table.td>
                                            @angelinajolie</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            Brad</x-base.table.td>
                                            Pitt</x-base.table.td>
                                            @bradpitt</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            Charlie</x-base.table.td>
                                            Hunnam</x-base.table.td>
                                            @charliehunnam</x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                            </div>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Table Head Options -->
            <!-- BEGIN: Responsive Table -->
            
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Responsive Table
                    </h2>
                    
                        
                            Show example code
                        </x-base.form-switch.label>
                        <x-base.form-switch.input
                            class="ml-3 mr-0"
                            id="show-example-6"
                            type="checkbox"
                        />
                    </x-base.form-switch>
                </div>
                <div class="p-5">
                    
                        <div class="overflow-x-auto">
                            
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                        
                                            Email
                                        </x-base.table.th>
                                        
                                            Address
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        
                                            Angelina
                                        </x-base.table.td>
                                        
                                            Jolie
                                        </x-base.table.td>
                                        
                                            @angelinajolie
                                        </x-base.table.td>
                                        
                                            angelinajolie@gmail.com
                                        </x-base.table.td>
                                        
                                            260 W. Storm Street New York, NY 10025.
                                        </x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        
                                            Brad
                                        </x-base.table.td>
                                        
                                            Pitt
                                        </x-base.table.td>
                                        
                                            @bradpitt
                                        </x-base.table.td>
                                        
                                            bradpitt@gmail.com
                                        </x-base.table.td>
                                        
                                            47 Division St. Buffalo, NY 14241.
                                        </x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        
                                            Charlie
                                        </x-base.table.td>
                                        
                                            Hunnam
                                        </x-base.table.td>
                                        
                                            @charliehunnam
                                        </x-base.table.td>
                                        
                                            charliehunnam@gmail.com
                                        </x-base.table.td>
                                        
                                            8023 Amerige Street Harriman, NY 10926.
                                        </x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                    </x-base.preview>
                    
                        
                            <div class="overflow-x-auto">
                                
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                            
                                                Email
                                            </x-base.table.th>
                                            
                                                Address
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            
                                                Angelina
                                            </x-base.table.td>
                                            
                                                Jolie
                                            </x-base.table.td>
                                            
                                                @angelinajolie
                                            </x-base.table.td>
                                            
                                                angelinajolie@gmail.com
                                            </x-base.table.td>
                                            
                                                260 W. Storm Street New York, NY 10025.
                                            </x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            
                                                Brad
                                            </x-base.table.td>
                                            
                                                Pitt
                                            </x-base.table.td>
                                            
                                                @bradpitt
                                            </x-base.table.td>
                                            
                                                bradpitt@gmail.com
                                            </x-base.table.td>
                                            
                                                47 Division St. Buffalo, NY 14241.
                                            </x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            
                                                Charlie
                                            </x-base.table.td>
                                            
                                                Hunnam
                                            </x-base.table.td>
                                            
                                                @charliehunnam
                                            </x-base.table.td>
                                            
                                                charliehunnam@gmail.com
                                            </x-base.table.td>
                                            
                                                8023 Amerige Street Harriman, NY 10926.
                                            </x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                            </div>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Responsive Table -->
            <!-- BEGIN: Small Table -->
            
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">Small Table</h2>
                    
                        
                            Show example code
                        </x-base.form-switch.label>
                        <x-base.form-switch.input
                            class="ml-3 mr-0"
                            id="show-example-7"
                            type="checkbox"
                        />
                    </x-base.form-switch>
                </div>
                <div class="p-5">
                    
                        <div class="overflow-x-auto">
                            
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        Angelina</x-base.table.td>
                                        Jolie</x-base.table.td>
                                        @angelinajolie</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        Brad</x-base.table.td>
                                        Pitt</x-base.table.td>
                                        @bradpitt</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        Charlie</x-base.table.td>
                                        Hunnam</x-base.table.td>
                                        @charliehunnam</x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                    </x-base.preview>
                    
                        
                            <div class="overflow-x-auto">
                                
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            Angelina</x-base.table.td>
                                            Jolie</x-base.table.td>
                                            @angelinajolie</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            Brad</x-base.table.td>
                                            Pitt</x-base.table.td>
                                            @bradpitt</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            Charlie</x-base.table.td>
                                            Hunnam</x-base.table.td>
                                            @charliehunnam</x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                            </div>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Small Table -->
            <!-- BEGIN: Striped Rows -->
            
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Striped Rows
                    </h2>
                    
                        
                            Show example code
                        </x-base.form-switch.label>
                        <x-base.form-switch.input
                            class="ml-3 mr-0"
                            id="show-example-8"
                            type="checkbox"
                        />
                    </x-base.form-switch>
                </div>
                <div class="p-5">
                    
                        <div class="overflow-x-auto">
                            
                                
                                    
                                        #</x-base.table.th>
                                        
                                            First Name
                                        </x-base.table.th>
                                        
                                            Last Name
                                        </x-base.table.th>
                                        
                                            Username
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                
                                    
                                        1</x-base.table.td>
                                        Angelina</x-base.table.td>
                                        Jolie</x-base.table.td>
                                        @angelinajolie</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        2</x-base.table.td>
                                        Brad</x-base.table.td>
                                        Pitt</x-base.table.td>
                                        @bradpitt</x-base.table.td>
                                    </x-base.table.tr>
                                    
                                        3</x-base.table.td>
                                        Charlie</x-base.table.td>
                                        Hunnam</x-base.table.td>
                                        @charliehunnam</x-base.table.td>
                                    </x-base.table.tr>
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                    </x-base.preview>
                    
                        
                            <div class="overflow-x-auto">
                                
                                    
                                        
                                            #</x-base.table.th>
                                            
                                                First Name
                                            </x-base.table.th>
                                            
                                                Last Name
                                            </x-base.table.th>
                                            
                                                Username
                                            </x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    
                                        
                                            1</x-base.table.td>
                                            Angelina</x-base.table.td>
                                            Jolie</x-base.table.td>
                                            @angelinajolie</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            2</x-base.table.td>
                                            Brad</x-base.table.td>
                                            Pitt</x-base.table.td>
                                            @bradpitt</x-base.table.td>
                                        </x-base.table.tr>
                                        
                                            3</x-base.table.td>
                                            Charlie</x-base.table.td>
                                            Hunnam</x-base.table.td>
                                            @charliehunnam</x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                            </div>
                        </x-base.highlight>
                    </x-base.source>
                </div>
            </x-base.preview-component>
            <!-- END: Striped Rows -->
        </div>
    </div>
@endsection
