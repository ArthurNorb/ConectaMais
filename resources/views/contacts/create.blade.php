@extends('layouts.main')

@section('title', 'Adicionar novo contato')

@section('content')

    <div class="relative flex items-center justify-center min-h-screen px-4 py-12 bg-slate-100 sm:px-6 lg:px-8">
        <div class="z-10 w-full max-w-md p-10 space-y-8 bg-white shadow-lg rounded-xl">
            <div class="grid grid-cols-1 gap-8">
                <div class="flex flex-col ">
                    <div class="flex flex-col items-center sm:flex-row">
                        <h2 class="mr-auto text-lg font-semibold text-themeColor">Adicionar Novo Contato</h2>
                        <div class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0"></div>
                    </div>
                    <div class="mt-5">
                        <div class="form">
                            <div class="mb-3 md:space-y-2">
                                <label class="pt-2 text-xs font-semibold text-themeColor">Foto </label>
                                <div class="flex items-center pb-6">
                                    <div class="flex-none w-16 h-16 mr-4 overflow-hidden border rounded-xl">
                                        <img class="object-cover w-16 h-16 mr-4" src="/img/no-profile-pic-icon.jpg" alt="Avatar Upload">
                                    </div>
                                    <label class="cursor-pointer ">
                                        <button type="button" class="px-4 py-2 text-sm text-white border-2 border-white rounded-full bg-themeColor hover:bg-white hover:text-themeColor hover:border-themeColor">Browse</button>
                                    </label>
                                </div>
                            </div>
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Nome <abbr title="required">*</abbr></label>
                                    <input placeholder="Nome" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" required="required" type="text">
                                </div>
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Sobreome <abbr title="required">*</abbr></label>
                                    <input placeholder="Sobrenome" class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" required="required" type="text">
                                </div>
                            </div>
                            <div class="w-full mb-3 space-y-2 text-xs">
                                <label class="py-2 font-semibold text-gray-600 ">Company Website</label>
                                <div class="relative flex flex-wrap items-stretch w-full mb-4">
                                    <div class="flex">
                                        <span
                                            class="flex items-center justify-center w-12 h-10 px-3 text-sm text-xl leading-normal text-white whitespace-no-wrap bg-blue-300 border border-r-0 border-blue-300 rounded-lg rounded-r-none bg-grey-lighter border-1 text-grey-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="relative flex-1 flex-auto flex-grow flex-shrink w-px h-10 px-3 leading-normal border border-l-0 rounded-lg rounded-l-none border-grey-light focus:border-blue focus:shadow"
                                        placeholder="https://">
                                </div>
                            </div>
                            <div class="w-full text-xs md:flex md:flex-row md:space-x-4">
                                <div class="flex flex-col w-full mb-3">
                                    <label class="py-2 font-semibold text-gray-600">Company Address</label>
                                    <input placeholder="Address"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text" name="integration[street_address]" id="integration_street_address">
                                </div>
                                <div class="flex flex-col w-full mb-3">
                                    <label class="py-2 font-semibold text-gray-600">Location<abbr
                                            title="required">*</abbr></label>
                                    <select
                                        class="block w-full h-10 px-4 border rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter md:w-full "
                                        required="required" name="integration[city_id]" id="integration_city_id">
                                        <option value="">Seleted location</option>
                                        <option value="">Cochin,KL</option>
                                        <option value="">Mumbai,MH</option>
                                        <option value="">Bangalore,KA</option>
                                    </select>
                                    <p class="hidden mt-3 text-sm text-red-500" id="error">Please fill out this field.
                                    </p>
                                </div>
                            </div>
                            <div class="flex-auto w-full mb-1 space-y-2 text-xs">
                                <label class="py-2 font-semibold text-gray-600">Description</label>
                                <textarea required="" name="message" id=""
                                    class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                                    placeholder="Enter your comapny info" spellcheck="false"></textarea>
                                <p class="my-3 text-xs text-left text-gray-400">You inserted 0 characters</p>
                            </div>
                            <p class="my-3 text-xs text-right text-red-500">Required fields are marked with an
                                asterisk <abbr title="Required field">*</abbr></p>
                            <div class="flex flex-col-reverse mt-5 text-right md:space-x-3 md:block">
                                <button
                                    class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-gray-600 bg-white border rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-gray-100">
                                    Cancel </button>
                                <button
                                    class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-green-400 rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-green-500">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
