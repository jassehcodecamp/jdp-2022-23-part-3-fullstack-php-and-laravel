@props([
    'job' => []
])

@php
$logoBgs = collect(['bg-gray-900', 'bg-orange-600', 'bg-rose-500', 'bg-blue-600'])
@endphp

<div class="flex items-center justify-between shadow-md w-full bg-white py-8 px-6 border-l-[6px] border-primary rounded-md">
                
            <div class="flex items-center gap-x-4 ">    
                <div class="h-20 w-20 rounded-full flex items-center justify-center {{$logoBgs->random()}}">
                    <span class="text-sm font-semibold text-gray-100 uppercase">{{ $job['company']['name'] }}</span>
                </div>
                <div>
                    <div class="flex items-center gap-x-5">
                        <h3 class="text-primary font-semibold">Photosnap</h3>
                        <div class="flex items-center gap-x-2">
                            <span class="badge py-1 pt-2 px-3 font-semibold text-xs uppercase text-white bg-primary rounded-full">New!</span>
                            <span class="badge  py-1 pt-2 px-3 font-semibold text-xs uppercase text-white bg-secondary rounded-full">Featured</span>
                        </div>
                    </div>
                    <h2 class="font-bold text-2xl text-secondary my-1 mt-1.5">Senior Frontend Developer</h2>
                    <div class="flex items-center text-sm gap-x-4 text-light">
                        <span>1 day ago</span>
                        <span class="dot w-[3px] h-[3px] bg-gray-400 rounded-full"></span>
                        <span>Fulltime</span>
                        <span class="dot w-[3px] h-[3px] bg-gray-400 rounded-full"></span>
                        <span>USA only</span>
                    </div>
                </div>
            </div>

                <div class="flex gap-x-4 items-center">
                    <span class="pill text-primary py-2 px-4 bg-[hsl(180_31%_95%)] rounded">Frontend</span>
                    <span class="pill text-primary py-2 px-4 bg-[hsl(180_31%_95%)] rounded">Senior</span>
                    <span class="pill text-primary py-2 px-4 bg-[hsl(180_31%_95%)] rounded">HTML</span>
                    <span class="pill text-primary py-2 px-4 bg-[hsl(180_31%_95%)] rounded">CSS</span>
                    <span class="pill text-primary py-2 px-4 bg-[hsl(180_31%_95%)] rounded">JavaScript</span>
                </div>
            </div>