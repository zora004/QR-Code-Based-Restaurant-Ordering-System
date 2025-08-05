@extends('layouts.app')

@section('title', 'Tables Index')

@section('content')
    <div class="bg-white dark:bg-[#18181b] rounded-xl shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-[#1b1b18] dark:text-white">List of Tables</h2>
        <button command="show-modal" commandfor="dialog"
            class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition cursor-pointer">
            Create Table
        </button>
        <div class="overflow-x-auto">
            <table id="tables-list" class="display w-full">
                <thead>
                    <tr>
                        <th>QR</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <el-dialog>
        <dialog id="dialog" aria-labelledby="dialog-title"
            class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
            <el-dialog-backdrop
                class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

            <div tabindex="0"
                class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                <el-dialog-panel
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 id="dialog-title" class="text-base font-semibold text-gray-900">Create a Table</h3>
                                <div class="mt-2">

                                    <form>
                                        <div class="space-y-12">
                                            <div class="border-b border-gray-900/10 pb-12">
                                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                                    <div class="sm:col-span-4">
                                                        <label for="name"
                                                            class="block text-sm/6 font-medium text-gray-900">name</label>
                                                        <div class="mt-2">
                                                            <div
                                                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                                                <input id="tableName" type="text" name="name"
                                                                    placeholder="janesmith"
                                                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-span-full">
                                                        <label for="description"
                                                            class="block text-sm/6 font-medium text-gray-900">Description</label>
                                                        <div class="mt-2">
                                                            <textarea id="tableDescription" name="description" rows="3" placeholder="Enter a description of your table."
                                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                                        </div>
                                                        <p class="mt-3 text-sm/6 text-gray-600">Simple description for your
                                                            table.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button id="createTableBtn" type="button" command="close" commandfor="dialog"
                            class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-green-500 sm:ml-3 sm:w-auto">Create</button>
                        <button type="button" command="close" commandfor="dialog"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>
@endsection

@push('styles')
    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <style>
            #tables-list th,
            #tables-list td {
                color: #fff !important;
            }

            .dark #tables-list th,
            .dark #tables-list td {
                color: #fff !important;
                text-align: start;
            }
        </style>
    @endpush
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Modal open/close logic
            $('#openModalBtn').on('click', function() {
                $('#createTableModal').removeClass('hidden');
            });
            $('#closeModalBtn').on('click', function() {
                $('#createTableModal').addClass('hidden');
            });
            // Optional: close modal when clicking outside the modal content
            $('#createTableModal').on('click', function(e) {
                if (e.target === this) {
                    $(this).addClass('hidden');
                }
            });
            var tableList = $('#tables-list').DataTable({
                language: {
                    search: ""
                },
                processing: true,
                ajax: {
                    url: "tables/data",
                },
                columns: [{
                        data: 'qr_image',
                        name: 'qr_image',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "220px"
                    }
                ],
                columnDefs: [{
                    // className: "text-center",
                    targets: "_all"
                }],
                dom: 'Bfrtip'
            });

            $('#createTableBtn').on('click', function() {
                var data = {
                    'name': $('#tableName').val(),
                    'description': $('#tableDescription').val()
                }

                $.ajax({
                    type: 'POST',
                    url: '/tables',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        tableList.ajax.reload()
                        console.log('Orayt success')
                    }
                })
            });
        });
    </script>
@endpush
