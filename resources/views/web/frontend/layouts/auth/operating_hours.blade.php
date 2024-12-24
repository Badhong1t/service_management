@extends('web.frontend.app')

@section('title', 'Business Information')

@push('styles')
@endpush

@section('content')

    <main class="min-h-[calc(100vh-96px)] flex flex-col items-center justify-center font-poppins mx-5 md:mx-8 2xl:mx-0">
        <!-- Login Form -->
        <section
            class="sm:max-w-[500px] sm:min-w-[500px] p-4 md:p-6 rounded-2xl shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)]">
            <div>
                <h2 class="font-boldFont text-2xl md:text-3xl py-2 text-center text-[#222222]">
                    Set Operating Hours
                </h2>
            </div>

            <!-- accordion start -->
            <form action="{{ route('operatingHours.store') }}" method="post">
                @csrf
                <div class="bg-[#E5E5E5] rounded-lg px-6 pt-4 mt-5 accordion-section">
                    <div class="">
                        <div class="flex items-center justify-between pb-2">
                            <p class="accordion-header cursor-pointer">Saturday</p>
                            <div class="toggle-container">
                                <input type="checkbox" id="toggle-switch" class="toggle-switch" name="s_[]" />
                                <label for="toggle-switch" class="toggle-label">
                                    <div class="toggle-button"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- accordion content -->
                    <div class="flex items-center justify-between accordion-content py-4 mt-2">
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="s_[]">
                                <option value="Opens at" disabled selected>Opens at</option>
                                <option value="1:00 AM" {{ old('s_[0]') == '1:00 AM' ? 'selected' : '' }}>1:00 AM
                                </option>
                                <option value="2:00 AM" {{ old('s_start') == '2:00 AM' ? 'selected' : '' }}>2:00 AM
                                </option>
                                <option value="3:00 AM" {{ old('s_start') == '3:00 AM' ? 'selected' : '' }}>3:00 AM
                                </option>
                                <option value="4:00 AM" {{ old('s_start') == '4:00 AM' ? 'selected' : '' }}>4:00 AM
                                </option>
                                <option value="5:00 AM" {{ old('s_start') == '5:00 AM' ? 'selected' : '' }}>5:00 AM
                                </option>
                                <option value="6:00 AM" {{ old('s_start') == '6:00 AM' ? 'selected' : '' }}>6:00 AM
                                </option>
                                <option value="7:00 AM" {{ old('s_start') == '7:00 AM' ? 'selected' : '' }}>7:00 AM
                                </option>
                                <option value="8:00 AM" {{ old('s_start') == '8:00 AM' ? 'selected' : '' }}>8:00 AM
                                </option>
                                <option value="9:00 AM" {{ old('s_start') == '9:00 AM' ? 'selected' : '' }}>9:00 AM
                                </option>
                                <option value="10:00 AM" {{ old('s_start') == '10:00 AM' ? 'selected' : '' }}>10:00 AM
                                </option>
                                <option value="11:00 AM" {{ old('s_start') == '11:00 AM' ? 'selected' : '' }}>11:00 AM
                                </option>
                                <option value="12:00 PM" {{ old('s_start') == '12:00 PM' ? 'selected' : '' }}>12:00 PM
                                </option>
                                <option value="1:00 PM" {{ old('s_start') == '1:00 PM' ? 'selected' : '' }}>1:00 PM
                                </option>
                                <option value="2:00 PM" {{ old('s_start') == '2:00 PM' ? 'selected' : '' }}>2:00 PM
                                </option>
                                <option value="3:00 PM" {{ old('s_start') == '3:00 PM' ? 'selected' : '' }}>3:00 PM
                                </option>
                                <option value="4:00 PM" {{ old('s_start') == '4:00 PM' ? 'selected' : '' }}>4:00 PM
                                </option>
                                <option value="5:00 PM" {{ old('s_start') == '5:00 PM' ? 'selected' : '' }}>5:00 PM
                                </option>
                                <option value="6:00 PM" {{ old('s_start') == '6:00 PM' ? 'selected' : '' }}>6:00 PM
                                </option>
                                <option value="7:00 PM" {{ old('s_start') == '7:00 PM' ? 'selected' : '' }}>7:00 PM
                                </option>
                                <option value="8:00 PM" {{ old('s_start') == '8:00 PM' ? 'selected' : '' }}>8:00 PM
                                </option>
                                <option value="9:00 PM" {{ old('s_start') == '9:00 PM' ? 'selected' : '' }}>9:00 PM
                                </option>
                                <option value="10:00 PM" {{ old('s_start') == '10:00 PM' ? 'selected' : '' }}>10:00 PM
                                </option>
                                <option value="11:00 PM" {{ old('s_start') == '11:00 PM' ? 'selected' : '' }}>11:00 PM
                                </option>
                                <option value="12:00 AM" {{ old('s_start') == '12:00 AM' ? 'selected' : '' }}>12:00 AM
                                    </options>
                            </select>
                        </div>
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="s_[]">
                                <option value="Opens at" disabled selected>Opens at</option>
                                <option value="1:00 AM" {{ old('s_end') == '1:00 AM' ? 'selected' : '' }}>1:00 AM
                                </option>
                                <option value="2:00 AM" {{ old('s_end') == '2:00 AM' ? 'selected' : '' }}>2:00 AM
                                </option>
                                <option value="3:00 AM" {{ old('s_end') == '3:00 AM' ? 'selected' : '' }}>3:00 AM
                                </option>
                                <option value="4:00 AM" {{ old('s_end') == '4:00 AM' ? 'selected' : '' }}>4:00 AM
                                </option>
                                <option value="5:00 AM" {{ old('s_end') == '5:00 AM' ? 'selected' : '' }}>5:00 AM
                                </option>
                                <option value="6:00 AM" {{ old('s_end') == '6:00 AM' ? 'selected' : '' }}>6:00 AM
                                </option>
                                <option value="7:00 AM" {{ old('s_end') == '7:00 AM' ? 'selected' : '' }}>7:00 AM
                                </option>
                                <option value="8:00 AM" {{ old('s_end') == '8:00 AM' ? 'selected' : '' }}>8:00 AM
                                </option>
                                <option value="9:00 AM" {{ old('s_end') == '9:00 AM' ? 'selected' : '' }}>9:00 AM
                                </option>
                                <option value="10:00 AM" {{ old('s_end') == '10:00 AM' ? 'selected' : '' }}>10:00 AM
                                </option>
                                <option value="11:00 AM" {{ old('s_end') == '11:00 AM' ? 'selected' : '' }}>11:00 AM
                                </option>
                                <option value="12:00 PM" {{ old('s_end') == '12:00 PM' ? 'selected' : '' }}>12:00 PM
                                </option>
                                <option value="1:00 PM" {{ old('s_end') == '1:00 PM' ? 'selected' : '' }}>1:00 PM
                                </option>
                                <option value="2:00 PM" {{ old('s_end') == '2:00 PM' ? 'selected' : '' }}>2:00 PM
                                </option>
                                <option value="3:00 PM" {{ old('s_end') == '3:00 PM' ? 'selected' : '' }}>3:00 PM
                                </option>
                                <option value="4:00 PM" {{ old('s_end') == '4:00 PM' ? 'selected' : '' }}>4:00 PM
                                </option>
                                <option value="5:00 PM" {{ old('s_end') == '5:00 PM' ? 'selected' : '' }}>5:00 PM
                                </option>
                                <option value="6:00 PM" {{ old('s_end') == '6:00 PM' ? 'selected' : '' }}>6:00 PM
                                </option>
                                <option value="7:00 PM" {{ old('s_end') == '7:00 PM' ? 'selected' : '' }}>7:00 PM
                                </option>
                                <option value="8:00 PM" {{ old('s_end') == '8:00 PM' ? 'selected' : '' }}>8:00 PM
                                </option>
                                <option value="9:00 PM" {{ old('s_end') == '9:00 PM' ? 'selected' : '' }}>9:00 PM
                                </option>
                                <option value="10:00 PM" {{ old('s_end') == '10:00 PM' ? 'selected' : '' }}>10:00 PM
                                </option>
                                <option value="11:00 PM" {{ old('s_end') == '11:00 PM' ? 'selected' : '' }}>11:00 PM
                                </option>
                                <option value="12:00 AM" {{ old('s_end') == '12:00 AM' ? 'selected' : '' }}>12:00 AM
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                @error('s_')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="bg-[#E5E5E5] rounded-lg px-6 pt-4 mt-5 accordion-section">
                    <div class="">
                        <div class="flex items-center justify-between pb-2">
                            <p class="accordion-header cursor-pointer">Sunday</p>
                            <div class="toggle-container">
                                <input type="checkbox" id="toggle-switch2" class="toggle-switch" name="su_[]" />
                                <label for="toggle-switch2" class="toggle-label">
                                    <div class="toggle-button"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- accordion content -->
                    <div class="flex items-center justify-between accordion-content py-4 mt-2">
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="su_[]">
                                <option value="Opens at" disabled selected>Opens at</option>
                                <option value="1:00 AM" {{ old('su_start') == '1:00 AM' ? 'selected' : '' }}>1:00 AM
                                </option>
                                <option value="2:00 AM" {{ old('su_start') == '2:00 AM' ? 'selected' : '' }}>2:00 AM
                                </option>
                                <option value="3:00 AM" {{ old('su_start') == '3:00 AM' ? 'selected' : '' }}>3:00 AM
                                </option>
                                <option value="4:00 AM" {{ old('su_start') == '4:00 AM' ? 'selected' : '' }}>4:00 AM
                                </option>
                                <option value="5:00 AM" {{ old('su_start') == '5:00 AM' ? 'selected' : '' }}>5:00 AM
                                </option>
                                <option value="6:00 AM" {{ old('su_start') == '6:00 AM' ? 'selected' : '' }}>6:00 AM
                                </option>
                                <option value="7:00 AM" {{ old('su_start') == '7:00 AM' ? 'selected' : '' }}>7:00 AM
                                </option>
                                <option value="8:00 AM" {{ old('su_start') == '8:00 AM' ? 'selected' : '' }}>8:00 AM
                                </option>
                                <option value="9:00 AM" {{ old('su_start') == '9:00 AM' ? 'selected' : '' }}>9:00 AM
                                </option>
                                <option value="10:00 AM" {{ old('su_start') == '10:00 AM' ? 'selected' : '' }}>10:00 AM
                                </option>
                                <option value="11:00 AM" {{ old('su_start') == '11:00 AM' ? 'selected' : '' }}>11:00 AM
                                </option>
                                <option value="12:00 PM" {{ old('su_start') == '12:00 PM' ? 'selected' : '' }}>12:00 PM
                                </option>
                                <option value="1:00 PM" {{ old('su_start') == '1:00 PM' ? 'selected' : '' }}>1:00 PM
                                </option>
                                <option value="2:00 PM" {{ old('su_start') == '2:00 PM' ? 'selected' : '' }}>2:00 PM
                                </option>
                                <option value="3:00 PM" {{ old('su_start') == '3:00 PM' ? 'selected' : '' }}>3:00 PM
                                </option>
                                <option value="4:00 PM" {{ old('su_start') == '4:00 PM' ? 'selected' : '' }}>4:00 PM
                                </option>
                                <option value="5:00 PM" {{ old('su_start') == '5:00 PM' ? 'selected' : '' }}>5:00 PM
                                </option>
                                <option value="6:00 PM" {{ old('su_start') == '6:00 PM' ? 'selected' : '' }}>6:00 PM
                                </option>
                                <option value="7:00 PM" {{ old('su_start') == '7:00 PM' ? 'selected' : '' }}>7:00 PM
                                </option>
                                <option value="8:00 PM" {{ old('su_start') == '8:00 PM' ? 'selected' : '' }}>8:00 PM
                                </option>
                                <option value="9:00 PM" {{ old('su_start') == '9:00 PM' ? 'selected' : '' }}>9:00 PM
                                </option>
                                <option value="10:00 PM" {{ old('su_start') == '10:00 PM' ? 'selected' : '' }}>10:00 PM
                                </option>
                                <option value="11:00 PM" {{ old('su_start') == '11:00 PM' ? 'selected' : '' }}>11:00 PM
                                </option>
                                <option value="12:00 AM" {{ old('su_start') == '12:00 AM' ? 'selected' : '' }}>12:00 AM
                                </option>
                            </select>
                        </div>
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="su_[]">
                                <option value="Opens at" disabled selected>Opens at</option>
                                <option value="1:00 AM" {{ old('su_end') == '1:00 AM' ? 'selected' : '' }}>1:00 AM
                                </option>
                                <option value="2:00 AM" {{ old('su_end') == '2:00 AM' ? 'selected' : '' }}>2:00 AM
                                </option>
                                <option value="3:00 AM" {{ old('su_end') == '3:00 AM' ? 'selected' : '' }}>3:00 AM
                                </option>
                                <option value="4:00 AM" {{ old('su_end') == '4:00 AM' ? 'selected' : '' }}>4:00 AM
                                </option>
                                <option value="5:00 AM" {{ old('su_end') == '5:00 AM' ? 'selected' : '' }}>5:00 AM
                                </option>
                                <option value="6:00 AM" {{ old('su_end') == '6:00 AM' ? 'selected' : '' }}>6:00 AM
                                </option>
                                <option value="7:00 AM" {{ old('su_end') == '7:00 AM' ? 'selected' : '' }}>7:00 AM
                                </option>
                                <option value="8:00 AM" {{ old('su_end') == '8:00 AM' ? 'selected' : '' }}>8:00 AM
                                </option>
                                <option value="9:00 AM" {{ old('su_end') == '9:00 AM' ? 'selected' : '' }}>9:00 AM
                                </option>
                                <option value="10:00 AM" {{ old('su_end') == '10:00 AM' ? 'selected' : '' }}>10:00 AM
                                </option>
                                <option value="11:00 AM" {{ old('su_end') == '11:00 AM' ? 'selected' : '' }}>11:00 AM
                                </option>
                                <option value="12:00 PM" {{ old('su_end') == '12:00 PM' ? 'selected' : '' }}>12:00 PM
                                </option>
                                <option value="1:00 PM" {{ old('su_end') == '1:00 PM' ? 'selected' : '' }}>1:00 PM
                                </option>
                                <option value="2:00 PM" {{ old('su_end') == '2:00 PM' ? 'selected' : '' }}>2:00 PM
                                </option>
                                <option value="3:00 PM" {{ old('su_end') == '3:00 PM' ? 'selected' : '' }}>3:00 PM
                                </option>
                                <option value="4:00 PM" {{ old('su_end') == '4:00 PM' ? 'selected' : '' }}>4:00 PM
                                </option>
                                <option value="5:00 PM" {{ old('su_end') == '5:00 PM' ? 'selected' : '' }}>5:00 PM
                                </option>
                                <option value="6:00 PM" {{ old('su_end') == '6:00 PM' ? 'selected' : '' }}>6:00 PM
                                </option>
                                <option value="7:00 PM" {{ old('su_end') == '7:00 PM' ? 'selected' : '' }}>7:00 PM
                                </option>
                                <option value="8:00 PM" {{ old('su_end') == '8:00 PM' ? 'selected' : '' }}>8:00 PM
                                </option>
                                <option value="9:00 PM" {{ old('su_end') == '9:00 PM' ? 'selected' : '' }}>9:00 PM
                                </option>
                                <option value="10:00 PM" {{ old('su_end') == '10:00 PM' ? 'selected' : '' }}>10:00 PM
                                </option>
                                <option value="11:00 PM" {{ old('su_end') == '11:00 PM' ? 'selected' : '' }}>11:00 PM
                                </option>
                                <option value="12:00 AM" {{ old('su_end') == '12:00 AM' ? 'selected' : '' }}>12:00 AM
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                @error('su_')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="bg-[#E5E5E5] rounded-lg px-6 pt-4 mt-5 accordion-section">
                    <div class="">
                        <div class="flex items-center justify-between pb-2">
                            <p class="accordion-header cursor-pointer">Monday</p>
                            <div class="toggle-container">
                                <input type="checkbox" id="toggle-switch3" class="toggle-switch" name="m_[]" />
                                <label for="toggle-switch3" class="toggle-label">
                                    <div class="toggle-button"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- accordion content -->
                    <div class="flex items-center justify-between accordion-content py-4 mt-2">
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="m_[]">
                                <option value="Opens at" disabled selected>Opens at</option>
                                <option value="1:00 AM" {{ old('m_start') == '1:00 AM' ? 'selected' : '' }}>1:00 AM
                                </option>
                                <option value="2:00 AM" {{ old('m_start') == '2:00 AM' ? 'selected' : '' }}>2:00 AM
                                </option>
                                <option value="3:00 AM" {{ old('m_start') == '3:00 AM' ? 'selected' : '' }}>3:00 AM
                                </option>
                                <option value="4:00 AM" {{ old('m_start') == '4:00 AM' ? 'selected' : '' }}>4:00 AM
                                </option>
                                <option value="5:00 AM" {{ old('m_start') == '5:00 AM' ? 'selected' : '' }}>5:00 AM
                                </option>
                                <option value="6:00 AM" {{ old('m_start') == '6:00 AM' ? 'selected' : '' }}>6:00 AM
                                </option>
                                <option value="7:00 AM" {{ old('m_start') == '7:00 AM' ? 'selected' : '' }}>7:00 AM
                                </option>
                                <option value="8:00 AM" {{ old('m_start') == '8:00 AM' ? 'selected' : '' }}>8:00 AM
                                </option>
                                <option value="9:00 AM" {{ old('m_start') == '9:00 AM' ? 'selected' : '' }}>9:00 AM
                                </option>
                                <option value="10:00 AM" {{ old('m_start') == '10:00 AM' ? 'selected' : '' }}>10:00 AM
                                </option>
                                <option value="11:00 AM" {{ old('m_start') == '11:00 AM' ? 'selected' : '' }}>11:00 AM
                                </option>
                                <option value="12:00 PM" {{ old('m_start') == '12:00 PM' ? 'selected' : '' }}>12:00 PM
                                </option>
                                <option value="1:00 PM" {{ old('m_start') == '1:00 PM' ? 'selected' : '' }}>1:00 PM
                                </option>
                                <option value="2:00 PM" {{ old('m_start') == '2:00 PM' ? 'selected' : '' }}>2:00 PM
                                </option>
                                <option value="3:00 PM" {{ old('m_start') == '3:00 PM' ? 'selected' : '' }}>3:00 PM
                                </option>
                                <option value="4:00 PM" {{ old('m_start') == '4:00 PM' ? 'selected' : '' }}>4:00 PM
                                </option>
                                <option value="5:00 PM" {{ old('m_start') == '5:00 PM' ? 'selected' : '' }}>5:00 PM
                                </option>
                                <option value="6:00 PM" {{ old('m_start') == '6:00 PM' ? 'selected' : '' }}>6:00 PM
                                </option>
                                <option value="7:00 PM" {{ old('m_start') == '7:00 PM' ? 'selected' : '' }}>7:00 PM
                                </option>
                                <option value="8:00 PM" {{ old('m_start') == '8:00 PM' ? 'selected' : '' }}>8:00 PM
                                </option>
                                <option value="9:00 PM" {{ old('m_start') == '9:00 PM' ? 'selected' : '' }}>9:00 PM
                                </option>
                                <option value="10:00 PM" {{ old('m_start') == '10:00 PM' ? 'selected' : '' }}>10:00 PM
                                </option>
                                <option value="11:00 PM" {{ old('m_start') == '11:00 PM' ? 'selected' : '' }}>11:00 PM
                                </option>
                                <option value="12:00 AM" {{ old('m_start') == '12:00 AM' ? 'selected' : '' }}>12:00 AM
                                </option>
                            </select>
                        </div>
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="m_[]">
                                <option value="Opens at" disabled selected>Close At</option>
                                <option value="1:00 AM" {{ old('m_end') == '1:00 AM' ? 'selected' : '' }}>1:00 AM
                                </option>
                                <option value="2:00 AM" {{ old('m_end') == '2:00 AM' ? 'selected' : '' }}>2:00 AM
                                </option>
                                <option value="3:00 AM" {{ old('m_end') == '3:00 AM' ? 'selected' : '' }}>3:00 AM
                                </option>
                                <option value="4:00 AM" {{ old('m_end') == '4:00 AM' ? 'selected' : '' }}>4:00 AM
                                </option>
                                <option value="5:00 AM" {{ old('m_end') == '5:00 AM' ? 'selected' : '' }}>5:00 AM
                                </option>
                                <option value="6:00 AM" {{ old('m_end') == '6:00 AM' ? 'selected' : '' }}>6:00 AM
                                </option>
                                <option value="7:00 AM" {{ old('m_end') == '7:00 AM' ? 'selected' : '' }}>7:00 AM
                                </option>
                                <option value="8:00 AM" {{ old('m_end') == '8:00 AM' ? 'selected' : '' }}>8:00 AM
                                </option>
                                <option value="9:00 AM" {{ old('m_end') == '9:00 AM' ? 'selected' : '' }}>9:00 AM
                                </option>
                                <option value="10:00 AM" {{ old('m_end') == '10:00 AM' ? 'selected' : '' }}>10:00 AM
                                </option>
                                <option value="11:00 AM" {{ old('m_end') == '11:00 AM' ? 'selected' : '' }}>11:00 AM
                                </option>
                                <option value="12:00 PM" {{ old('m_end') == '12:00 PM' ? 'selected' : '' }}>12:00 PM
                                </option>
                                <option value="1:00 PM" {{ old('m_end') == '1:00 PM' ? 'selected' : '' }}>1:00 PM
                                </option>
                                <option value="2:00 PM" {{ old('m_end') == '2:00 PM' ? 'selected' : '' }}>2:00 PM
                                </option>
                                <option value="3:00 PM" {{ old('m_end') == '3:00 PM' ? 'selected' : '' }}>3:00 PM
                                </option>
                                <option value="4:00 PM" {{ old('m_end') == '4:00 PM' ? 'selected' : '' }}>4:00 PM
                                </option>
                                <option value="5:00 PM" {{ old('m_end') == '5:00 PM' ? 'selected' : '' }}>5:00 PM
                                </option>
                                <option value="6:00 PM" {{ old('m_end') == '6:00 PM' ? 'selected' : '' }}>6:00 PM
                                </option>
                                <option value="7:00 PM" {{ old('m_end') == '7:00 PM' ? 'selected' : '' }}>7:00 PM
                                </option>
                                <option value="8:00 PM" {{ old('m_end') == '8:00 PM' ? 'selected' : '' }}>8:00 PM
                                </option>
                                <option value="9:00 PM" {{ old('m_end') == '9:00 PM' ? 'selected' : '' }}>9:00 PM
                                </option>
                                <option value="10:00 PM" {{ old('m_end') == '10:00 PM' ? 'selected' : '' }}>10:00 PM
                                </option>
                                <option value="11:00 PM" {{ old('m_end') == '11:00 PM' ? 'selected' : '' }}>11:00 PM
                                </option>
                                <option value="12:00 AM" {{ old('m_end') == '12:00 AM' ? 'selected' : '' }}>12:00 AM
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                @error('m_')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="bg-[#E5E5E5] rounded-lg px-6 pt-4 mt-5 accordion-section">
                    <div class="">
                        <div class="flex items-center justify-between pb-2">
                            <p class="accordion-header cursor-pointer">Tuesday</p>
                            <div class="toggle-container">
                                <input type="checkbox" id="toggle-switch4" class="toggle-switch" name="t_[]" />
                                <label for="toggle-switch4" class="toggle-label">
                                    <div class="toggle-button"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- accordion content -->
                    <div class="flex items-center justify-between accordion-content py-4 mt-2">
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="t_[]">
                                <option value="Opens at" disabled selected>Opens at</option>
                                <option value="1:00 AM">1:00 AM</option>
                                <option value="2:00 AM">2:00 AM</option>
                                <option value="3:00 AM">3:00 AM</option>
                                <option value="4:00 AM">4:00 AM</option>
                                <option value="5:00 AM">5:00 AM</option>
                                <option value="6:00 AM">6:00 AM</option>
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 AM">12:00 AM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="12:00 AM">12:00 AM</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="t_[]">
                                <option value="Close At" disabled selected>Close At</option>
                                <option value="1:00 AM">1:00 AM</option>
                                <option value="2:00 AM">2:00 AM</option>
                                <option value="3:00 AM">3:00 AM</option>
                                <option value="4:00 AM">4:00 AM</option>
                                <option value="5:00 AM">5:00 AM</option>
                                <option value="6:00 AM">6:00 AM</option>
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 AM">12:00 AM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="12:00 AM">12:00 AM</option>
                            </select>
                        </div>
                    </div>
                </div>
                @error('t_')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="bg-[#E5E5E5] rounded-lg px-6 pt-4 mt-5 accordion-section">
                    <div class="">
                        <div class="flex items-center justify-between pb-2">
                            <p class="accordion-header cursor-pointer">Wednesday</p>
                            <div class="toggle-container">
                                <input type="checkbox" id="toggle-switch5" class="toggle-switch" name="w_[]" />
                                <label for="toggle-switch5" class="toggle-label">
                                    <div class="toggle-button"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- accordion content -->
                    <div class="flex items-center justify-between accordion-content py-4 mt-2">
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="w_[]">
                                <option value="Opens at" disabled selected>Opens at</option>
                                <option value="1:00 AM">1:00 AM</option>
                                <option value="2:00 AM">2:00 AM</option>
                                <option value="3:00 AM">3:00 AM</option>
                                <option value="4:00 AM">4:00 AM</option>
                                <option value="5:00 AM">5:00 AM</option>
                                <option value="6:00 AM">6:00 AM</option>
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 AM">12:00 AM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="12:00 AM">12:00 AM</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="w_[]">
                                <option value="Close At" disabled selected>Close At</option>
                                <option value="1:00 AM">1:00 AM</option>
                                <option value="2:00 AM">2:00 AM</option>
                                <option value="3:00 AM">3:00 AM</option>
                                <option value="4:00 AM">4:00 AM</option>
                                <option value="5:00 AM">5:00 AM</option>
                                <option value="6:00 AM">6:00 AM</option>
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 AM">12:00 AM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="12:00 AM">12:00 AM</option>
                            </select>
                        </div>
                    </div>
                </div>
                @error('w_')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="bg-[#E5E5E5] rounded-lg px-6 pt-4 mt-5 accordion-section">
                    <div class="">
                        <div class="flex items-center justify-between pb-2">
                            <p class="accordion-header cursor-pointer">Thursday</p>
                            <div class="toggle-container">
                                <input type="checkbox" id="toggle-switch6" class="toggle-switch" name="th_[]" />
                                <label for="toggle-switch6" class="toggle-label">
                                    <div class="toggle-button"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- accordion content -->
                    <div class="flex items-center justify-between accordion-content py-4 mt-2">
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="th_[]">
                                <option value="Opens at" disabled selected>Opens at</option>
                                <option value="1:00 AM">1:00 AM</option>
                                <option value="2:00 AM">2:00 AM</option>
                                <option value="3:00 AM">3:00 AM</option>
                                <option value="4:00 AM">4:00 AM</option>
                                <option value="5:00 AM">5:00 AM</option>
                                <option value="6:00 AM">6:00 AM</option>
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 AM">12:00 AM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="12:00 AM">12:00 AM</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="th_[]">
                                <option value="Close At" disabled selected>Close At</option>
                                <option value="1:00 AM">1:00 AM</option>
                                <option value="2:00 AM">2:00 AM</option>
                                <option value="3:00 AM">3:00 AM</option>
                                <option value="4:00 AM">4:00 AM</option>
                                <option value="5:00 AM">5:00 AM</option>
                                <option value="6:00 AM">6:00 AM</option>
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 AM">12:00 AM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="12:00 AM">12:00 AM</option>
                            </select>
                        </div>
                    </div>
                </div>
                @error('th_')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="bg-[#E5E5E5] rounded-lg px-6 pt-4 mt-5 accordion-section">
                    <div class="">
                        <div class="flex items-center justify-between pb-2">
                            <p class="accordion-header cursor-pointer">Friday</p>
                            <div class="toggle-container">
                                <input type="checkbox" id="toggle-switch7" class="toggle-switch" name="f_[]" />
                                <label for="toggle-switch7" class="toggle-label">
                                    <div class="toggle-button"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- accordion content -->
                    <div class="flex items-center justify-between accordion-content py-4 mt-2">
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="f_[]">
                                <option value="Opens at" disabled selected>Opens at</option>
                                <option value="1:00 AM">1:00 AM</option>
                                <option value="2:00 AM">2:00 AM</option>
                                <option value="3:00 AM">3:00 AM</option>
                                <option value="4:00 AM">4:00 AM</option>
                                <option value="5:00 AM">5:00 AM</option>
                                <option value="6:00 AM">6:00 AM</option>
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 AM">12:00 AM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="12:00 AM">12:00 AM</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <select class="text-sm md:text-base" name="f_[]">
                                <option value="Close At" disabled selected>Close At</option>
                                <option value="1:00 AM">1:00 AM</option>
                                <option value="2:00 AM">2:00 AM</option>
                                <option value="3:00 AM">3:00 AM</option>
                                <option value="4:00 AM">4:00 AM</option>
                                <option value="5:00 AM">5:00 AM</option>
                                <option value="6:00 AM">6:00 AM</option>
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 AM">12:00 AM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="9:00 PM">9:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="12:00 AM">12:00 AM</option>
                            </select>
                        </div>
                    </div>
                </div>
                @error('f_')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="w-full mt-5">
                    <button type="submit"
                        class="font-semibold inline-block text-center bg-primary py-3 md:py-4 text-white w-full rounded-lg font-poppins">Continue</button>
                </div>
            </form>
            {{-- <form method="POST" action="">
                @csrf
                @foreach (['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'] as $day)
                    <div class="bg-[#E5E5E5] rounded-lg px-6 pt-4 mt-5 accordion-section">
                        <div class="flex items-center justify-between pb-2">
                            <p class="accordion-header cursor-pointer capitalize">{{ ucfirst($day) }}</p>
                            <div class="toggle-container">
                                <input type="checkbox" id="toggle-switch-{{ $day }}"
                                    name="{{ $day }}[status]" value="open" class="toggle-switch"
                                    @if (isset($operatingHours->$day) && $operatingHours->$day['status'] === 'open') checked @endif />
                                <label for="toggle-switch-{{ $day }}" class="toggle-label">
                                    <div class="toggle-button"></div>
                                </label>
                            </div>
                        </div>
                        <div class="flex items-center justify-between accordion-content py-4 mt-2">
                            <div class="set-operation-select w-full">
                                <select name="{{ $day }}[open]" class="text-sm md:text-base">
                                    <option value="Opens at" disabled selected>Opens at</option>
                                    @foreach (['1:00 AM', '2:00 AM', '3:00 AM', '4:00 AM', '5:00 AM', '6:00 AM', '7:00 AM', '8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM', '8:00 PM', '9:00 PM', '10:00 PM', '11:00 PM', '12:00 AM'] as $time)
                                        <option value="{{ $time }}"
                                            @if (isset($operatingHours->$day) && $operatingHours->$day['open'] === $time) selected @endif>
                                            {{ $time }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="set-operation-select w-full">
                                <select name="{{ $day }}[close]" class="text-sm md:text-base">
                                    <option value="Close At" disabled selected>Close At</option>
                                    @foreach (['1:00 AM', '2:00 AM', '3:00 AM', '4:00 AM', '5:00 AM', '6:00 AM', '7:00 AM', '8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM', '8:00 PM', '9:00 PM', '10:00 PM', '11:00 PM', '12:00 AM'] as $time)
                                        <option value="{{ $time }}"
                                            @if (isset($operatingHours->$day) && $operatingHours->$day['open'] === $time) selected @endif>
                                            {{ $time }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="w-full mt-5">
                    <button type="submit"
                        class="font-semibold inline-block text-center bg-primary py-3 md:py-4 text-white w-full rounded-lg font-poppins">

                        Continue

                    </button>
                </div>
            </form> --}}

        </section>
    </main>

@endsection

@push('scripts')
@endpush
