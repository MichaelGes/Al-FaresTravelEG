@extends('layouts.myapp')
@section('content')

<style>


main#carousel {
  grid-row: 1 / 2;
  grid-column: 1 / 8;
  width: 100vw;
  height: 500px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  transform-style: preserve-3d;
  perspective: 600px;
  --items: 5;
  --middle: 3;
  --position: 1;
  pointer-events: none;
}

div.item {
  position: absolute;
  width: 300px;
  height: 400px;
  background-color: coral;
  --r: calc(var(--position) - var(--offset));
  --abs: max(calc(var(--r) * -1), var(--r));
  transition: all 0.25s linear;
  transform: rotateY(calc(-10deg * var(--r)))
    translateX(calc(-300px * var(--r)));
  z-index: calc((var(--position) - var(--abs)));
}

div.item:nth-of-type(1) {
  --offset: 1;
  background-color: #90f1ef;
}
div.item:nth-of-type(2) {
  --offset: 2;
  background-color: #ff70a6;
}
div.item:nth-of-type(3) {
  --offset: 3;
  background-color: #ff9770;
}
div.item:nth-of-type(4) {
  --offset: 4;
  background-color: #ffd670;
}
div.item:nth-of-type(5) {
  --offset: 5;
  background-color: #e9ff70;
}

input:nth-of-type(1) {
  grid-column: 2 / 3;
  grid-row: 2 / 3;
}
input:nth-of-type(1):checked ~ main#carousel {
  --position: 1;
}

input:nth-of-type(2) {
  grid-column: 3 / 4;
  grid-row: 2 / 3;
}
input:nth-of-type(2):checked ~ main#carousel {
  --position: 2;
}

input:nth-of-type(3) {
  grid-column: 4 /5;
  grid-row: 2 / 3;
}
input:nth-of-type(3):checked ~ main#carousel {
  --position: 3;
}

input:nth-of-type(4) {
  grid-column: 5 / 6;
  grid-row: 2 / 3;
}
input:nth-of-type(4):checked ~ main#carousel {
  --position: 4;
}

input:nth-of-type(5) {
  grid-column: 6 / 7;
  grid-row: 2 / 3;
}
input:nth-of-type(5):checked ~ main#carousel {
  --position: 5;
}

</style>
    <main>
        <div class="bg-sec-100 ">
            {{-- hero --}}
            <div class="flex justify-center md:py-28 py-12 mx-auto max-w-screen-xl">
                <div class="flex  flex-col justify-center md:w-3/5  mx-12 md:ms-20 md:mx-0">
                    <h1 class=" md:text-start text-center  font-car font-bold text-gray-900 mb-8  md:text-7xl text-4xl "><span class="text-pr-400"> Al-Fares travel
                        </span>AND
                        Your fast way to travel and trips</h1>
                    <div class="md:w-3/5 md:hidden  ">
                        <img loading="lazy" src="/images/home car.png" alt="home car">
                    </div>
                    <p class="text-justify md:mx-0 mx-8 ">Whether you're planning a weekend
                        getaway or a cross-country adventure, we've got you covered. With our wide selection of vehicles and
                        convenient booking system, renting a car has never been this effortless.</p>
                    <div class="flex justify-center md:justify-start mt-12 md:w-2/3 me-12 md:-ms-12">
                        <a href="/cars">
                            <button
                                class="bg-pr-400 p-2 border-2 border-white rounded-md text-white hover:bg-pr-500 w-32 md:me-12 md:mx-12 mx-7 font-bold ">CARS</button>
                        </a>
                        <a href="/contact_us">
                            <button class="border-2 border-pr-400 text-black w-32 p-2 rounded-md hover:bg-sec-400">CONTACT
                                US</button>
                        </a>
                    </div>
                </div>
                <div class="md:w-3/5 hidden md:block  ">
                    <img loading="lazy" src="/images/home car.png" alt="home car">
                </div>

            </div>

            {{-- Cars Section --}}


            <div class="mx-auto max-w-screen-xl">
                <div class="flex align-middle justify-center">
                    <hr class=" mt-8 h-0.5 w-2/5 bg-pr-500">
                    <p class="my-2 mx-8  p-2 font-car font-bold text-pr-400 text-lg ">CARS</p>
                    <hr class=" mt-8 h-0.5 w-2/5 bg-pr-500">
                    <hr>
                </div>
                <div class="   md:mr-16 mr-4 mb-4 flex justify-end">
                    <a href="/cars">
                        <button
                            class="border-2 border-pr-400 text-black w-16 p-1 rounded-md hover:bg-pr-400 hover:text-white">See
                            All</button>
                    </a>
                </div>
            </div>

            <div class=" grid md:grid-cols-3  md:ps-4 justify-center p-2 gap-4 items-center mx-auto max-w-screen-xl ">
                @foreach ($cars as $car)
                    <div
                        class="relative md:m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                        <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="{{ route('car.reservation', ['car' => $car->id]) }}">
                            <img loading="lazy" class="object-cover" src="{{ $car->image }}" alt="product image" />
                            <span
                                class="absolute top-0 left-0 m-2 rounded-full bg-pr-400 px-2 text-center text-sm font-medium text-white">{{ $car->reduce }}
                                %
                                OFF</span>
                        </a>
                        <div class="mt-4 px-5 pb-5">
                            <div >
                                <h5 class=" font-bold text-xl tracking-tight text-slate-900">{{ $car->brand }}
                                    {{ $car->model }}
                                    {{ $car->engine }}</h5>
                            </div>
                            <div class="mt-2 mb-5 flex items-center justify-between">
                                <p>
                                    <span class="text-3xl font-bold text-slate-900">{{ $car->price_per_day }}</span>
                                    <span
                                        class="text-sm text-slate-900 line-through">{{ intval(($car->price_per_day * 100) / (100 - $car->reduce)) }}
                                    </span>
                                </p>

                                <div class="flex items-center">
                                    @for ($i = 0; $i < $car->stars; $i++)
                                        <svg aria-hidden="true" class="h-5 w-5 text-pr-300" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    @endfor
                                    <span
                                        class="mr-2 ml-3 rounded bg-pr-300 px-2.5 py-0.5 text-xs font-semibold">{{ $car->stars }}.0</span>
                                </div>
                            </div>
                            <a href="{{ route('car.reservation', ['car' => $car->id]) }}"
                                class="flex items-center justify-center rounded-md bg-slate-900 hover:bg-pr-400 px-5 py-2.5 text-center text-sm font-medium text-white  focus:outline-none focus:ring-4 focus:ring-blue-300">
                                <svg id="thisicon" class="mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512">
                                    <style>
                                        #thisicon {
                                            fill: #ffffff
                                        }
                                    </style>
                                    <path
                                        d="M184 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H96c-35.3 0-64 28.7-64 64v16 48V448c0 35.3 28.7 64 64 64H416c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H376V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H184V24zM80 192H432V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V192zm176 40c-13.3 0-24 10.7-24 24v48H184c-13.3 0-24 10.7-24 24s10.7 24 24 24h48v48c0 13.3 10.7 24 24 24s24-10.7 24-24V352h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H280V256c0-13.3-10.7-24-24-24z" />
                                </svg>
                                Reserve</a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Our numbers section --}}
            <div class="mx-auto max-w-screen-xl mt-16 mb-32">
                <div>
                    <h2 class="text-center font-car text-3xl font-medium text-pr-400"> <span
                            class=" text-gray-900">Our</span> Numbers</h2>
                </div>
                <div
                    class="bg-gray-800 text-white  mt-6 rounded-md flex md:flex-row flex-col md:justify-evently items-center gap-6 md:gap-0  mx-16 max-w-screen-xl">

                    <div
                        class="flex justify-around md:w-1/3 text-center my-4 h-16 align-middle md:border-b-0 md:border-r-2 border-b-2 pb-4 border-white">
                        <div class="flex flex-col justify-center">
                            <h3 class="font-car font-medium text-4xl">80</h3>
                            <p class="font-car  text-lg">Super Cars</p>
                        </div>
                    </div>
                    <div
                        class="flex justify-around md:w-1/3 text-center my-4 h-16 align-middle md:border-b-0 md:border-r-2 border-b-2 pb-4 border-white">
                        <div class="flex flex-col justify-center">
                            <h3 class="font-car font-medium text-4xl">4500 + </h3>
                            <p class="font-car  text-lg">Satisdied Client</p>
                        </div>
                    </div>
                    <div
                        class="flex justify-around md:w-1/3 text-center my-4 h-16 align-middle  border-b-2 pb-4 border-white md:border-b-0">
                        <div class="flex flex-col justify-center">
                            <h3 class="font-car font-medium text-4xl">7000</h3>
                            <p class="font-car  text-lg">Reservation</p>
                        </div>
                    </div>

                </div>
            </div>


            {{-- Why us section  --}}
            <div class="mx-auto max-w-screen-xl ">
                <div>
                    <h2 class="text-center font-car text-3xl font-medium text-pr-400"> <span
                            class=" text-gray-900">Why</span> Choose us</h2>
                </div>
                <div class="mt-7 mb-16">
                    <p class="md:text-center text-xl text-justify mx-8 ">We
                        prioritize your satisfaction and strive to make your car rental experience as seamless as possible.
                        With our wide selection of well-maintained vehicles, competitive prices, and simple booking process,
                        you can trust us to meet your needs. Our dedicated customer service team is available around the
                        clock to assist you, ensuring that you receive the support you deserve. Whether you need a car for a
                        weekend getaway or a long road trip, choose us for a hassle-free and enjoyable journey.</p>
                </div>

                <div class="container-fluid center" style="text-align: center">
                    <div>
                        <h2 class="text-center font-car text-3xl font-medium text-pr-400"> <span
                                class=" text-gray-900">Our</span> customer</h2><br>
                    </div>
                        <input type="radio" name="position" />
                        <input type="radio" name="position" />
                        <input type="radio" name="position" checked />
                        <input type="radio" name="position" />
                        <input type="radio" name="position" />
                        <main id="carousel">
                          <div class="item"><img src="\images\19c16.jpg" alt="home car"></div>
                          <div class="item"><img src="\images\32.jpg" alt="home car"></div>
                          <div class="item"><img src="\images\46c.jpg" alt="home car"></div>
                          <div class="item"><img src="\images\719.jpg" alt="home car"></div>
                          <div class="item"><img src="\images\d.jpg" alt="home car"></div>
                          <main>
                    
            </div>

            {{-- Orange car section --}}
            <div class=" relative -bottom-[1px] mx-auto max-w-screen-xl  ">
                <img loading="lazy" src="/images/orange car 1.png" alt="" class="w-full">
            </div>

        </div>
    </main>
@endsection
