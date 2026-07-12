<!DOCTYPE html>
<html lang="my" x-data="{ lang: 'MM', activeFaq: null }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipal Complaint Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans">
      
    <nav class="bg-[#006666] text-white shadow-xl sticky top-0 z-50 border-b border-[#001F35]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#006666] rounded-full flex items-center justify-center border-2 border-sky-400/30 shadow-md shrink-0 overflow-hidden">
    <img src="{{ asset('images/logo.png') }}" alt="YCDC Community Portal Logo" class="w-full h-full object-cover">
</div>
                    <div>
                        <span class="font-bold text-base md:text-lg tracking-wide block leading-tight text-white">Municipal Complaint Management System</span>
                    </div>
                </div>

                <div class="hidden lg:flex items-center gap-8 text-sm font-medium text-slate-200">
                    <a href="#home" class="hover:text-amber-400 transition-colors">
                        <span x-show="lang === 'MM'">ပင်မစာမျက်နှာ</span>
                        <span x-show="lang === 'EN'">Home</span>
                    </a>
                    <a href="#about" class="hover:text-amber-400 transition-colors">
                        <span x-show="lang === 'MM'">ကျွန်ုပ်တို့အကြောင်း</span>
                        <span x-show="lang === 'EN'">About Us</span>
                    </a>
                    <a href="#departments" class="hover:text-amber-400 transition-colors">
                        <span x-show="lang === 'MM'">ဌာနများ</span>
                        <span x-show="lang === 'EN'">Departments</span>
                    </a>
                    <a href="#departments" class="hover:text-amber-400 transition-colors">
                        <span x-show="lang === 'MM'">မေးခွန်းများ</span>
                        <span x-show="lang === 'EN'">FAQ</span>
                    </a>
                    <a href="#contact" class="hover:text-amber-400 transition-colors">
                        <span x-show="lang === 'MM'">ဆက်သွယ်ရန်</span>
                        <span x-show="lang === 'EN'">Contact Us</span>
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-1.5 text-xs font-bold border border-slate-700 px-2.5 py-1.5 rounded-lg bg-[#001F35]/60 text-slate-200">
                        <i class="fa-solid fa-globe text-sky-400"></i>
                        <button @click="lang = 'MM'" :class="lang === 'MM' ? 'text-amber-400 font-bold' : 'text-slate-400 hover:text-white'" class="transition-colors">MM</button>
                        <span class="text-slate-600">|</span>
                        <button @click="lang = 'EN'" :class="lang === 'EN' ? 'text-amber-400 font-bold' : 'text-slate-400 hover:text-white'" class="transition-colors">EN</button>
                    </div>

                    <a href="{{ route('login') }}" class="bg-[#F2A900] hover:bg-[#D99600] text-slate-900 font-bold text-sm px-5 py-2.5 rounded-xl shadow-md transition-all duration-200 flex items-center gap-2 group transform active:scale-95">
                        <i class="fa-solid fa-key text-xs transition-transform group-hover:rotate-12"></i>
                        <span x-show="lang === 'MM'">ဝင်ရောက်ရန်</span>
                        <span x-show="lang === 'EN'">Login</span>
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <div id="home" class="relative w-full bg-[#0a1120] border-b border-slate-800 mt-0 pt-0 select-none"
         x-data="{
            activeSlide: 1,
            next() { this.activeSlide = this.activeSlide === 4 ? 1 : this.activeSlide + 1 },
            prev() { this.activeSlide = this.activeSlide === 1 ? 4 : this.activeSlide - 1 }
         }">
         
        <div class="w-full h-[400px] md:h-[500px] grid grid-cols-1 md:grid-cols-12 relative">
            
            <div class="md:col-span-5 flex flex-col justify-center p-8 md:p-16 text-white z-20 bg-[#0a1120] relative">
                
                <div x-show="activeSlide === 1" x-transition.opacity>
                    <h1 class="text-2xl md:text-4xl font-extrabold mb-4 leading-tight">
                        <span x-show="lang === 'MM'">ရန်ကုန်မြို့တော်ကို နည်းပညာဖြင့် စမတ်စီးတီးအဖြစ် ပြောင်းလဲကြပါစို့</span>
                        <span x-show="lang === 'EN'">Transforming Yangon into a Smart City with Technology</span>
                    </h1>
                    <p class="text-xs md:text-sm text-slate-400 mb-6 leading-relaxed">
                        <span x-show="lang === 'MM'">ပြည်သူလူထုနှင့် သက်ဆိုင်ရာ စည်ပင်သာယာရေးဌာနများကို အလိုအလျောက် တိုက်ရိုက်ချိတ်ဆက်ပေးမည့် တိုင်ကြားစာ စီမံခန့်ခွဲမှုစနစ်။</span>
                        <span x-show="lang === 'EN'">An automated complaint management system linking citizens directly with respective municipal departments.</span>
                    </p>
                </div>

                <div x-show="activeSlide === 2" x-transition.opacity>
                    <h1 class="text-2xl md:text-4xl font-extrabold mb-4 leading-tight text-amber-400">
                        <span x-show="lang === 'MM'">လွယ်ကူလျင်မြန်စွာ တိုင်ကြားနိုင်ခြင်း</span>
                        <span x-show="lang === 'EN'">Easy & Quick Submission</span>
                    </h1>
                    <p class="text-xs md:text-sm text-slate-300 mb-6 leading-relaxed space-y-1">
                        <span x-show="lang === 'MM'">
                            • မိမိတို့ ကြုံတွေ့ရသည့် မြို့ပြပြဿနာများကို ဓာတ်ပုံရိုက်ယူပါ။<br>
                            • တိုင်ကြားလိုသည့် ဌာနအမျိုးအစားကို ရွေးချယ်ပါ။<br>
                            • တည်နေရာ (GPS Location) နှင့်အတူ စက္ကန့်ပိုင်းအတွင်း တင်ပြနိုင်ပါသည်။<br>
                            • စနစ်မှ သက်ဆိုင်ရာ တာဝန်ရှိဌာနထံ အလိုအလျောက် ပေးပို့ပေးမည် ဖြစ်သည်။
                        </span>
                        <span x-show="lang === 'EN'">
                            • Capture photos of the municipal issues you encounter.<br>
                            • Select the appropriate department category.<br>
                            • Submit within seconds along with your exact GPS location.<br>
                            • The system automatically routes tickets to responsible officials.
                        </span>
                    </p>
                </div>

                <div x-show="activeSlide === 3" x-transition.opacity>
                    <h1 class="text-2xl md:text-4xl font-extrabold mb-4 leading-tight text-emerald-400">
                        <span x-show="lang === 'MM'">အချိန်နဲ့တပြေးညီ စောင့်ကြည့်စစ်ဆေးခြင်း</span>
                        <span x-show="lang === 'EN'">Real-time Ticket Tracking</span>
                    </h1>
                    <p class="text-xs md:text-sm text-slate-300 mb-6 leading-relaxed">
                        <span x-show="lang === 'MM'">မိမိတင်ပြထားသော တိုင်ကြားစာကို စည်ပင်ဝန်ထမ်းများမှ စတင်ကိုင်တွယ်နေပြီလား (In Progress) သို့မဟုတ် ကွင်းဆင်းဖြေရှင်းပြီးသွားပြီလား (Resolved) ဆိုသည့် လုပ်ငန်းစဉ် အဆင့်ဆင့်ကို Dashboard ပေါ်တွင် ခြေရာခံ စောင့်ကြည့်နိုင်ပါသည်။</span>
                        <span x-show="lang === 'EN'">Track the exact stage of your report on your dashboard. Monitor whether municipal staff are processing your case (In Progress) or have successfully deployed and resolved the issue (Resolved) in real-time.</span>
                    </p>
                </div>

                <div x-show="activeSlide === 4" x-transition.opacity>
                    <h1 class="text-2xl md:text-4xl font-extrabold mb-4 leading-tight text-sky-400">
                        <span x-show="lang === 'MM'">ပွင့်လင်းမြင်သာပြီး ကောင်းမွန်သော တုံ့ပြန်မှု</span>
                        <span x-show="lang === 'EN'">Transparent & Better Governance</span>
                    </h1>
                    <p class="text-xs md:text-sm text-slate-300 mb-6 leading-relaxed">
                        <span x-show="lang === 'MM'">ဤစနစ်သည် ပြည်သူတို့၏ အသံကို နားထောင်ပြီး ရန်ကုန်မြို့တော်ကြီး သန့်ရှင်းသာယာလှပလာစေရန် ရည်ရွယ်ပါသည်။ ဌာနများ၏ တုံ့ပြန်ဆောင်ရွက်မှု နှုန်းထားများကို ပွင့်လင်းမြင်သာစွာ ဖော်ပြပေးထားသဖြင့် ပိုမိုကောင်းမွန်ပြီး တာဝန်ယူမှုရှိသော စည်ပင်သာယာရေးစနစ်ကို ဖော်ဆောင်နိုင်မှာ ဖြစ်ပါတယ်ရှင်။</span>
                        <span x-show="lang === 'EN'">This system amplifies citizens' voices to make Yangon clean, green, and beautiful. By transparently displaying departmental response rates, we foster a more effective, accountable, and responsive municipal community.</span>
                    </p>
                </div>

                <div>
                    <a href="{{ route('login') }}" class="inline-flex items-center space-x-2 bg-rose-600 hover:bg-rose-500 text-white font-bold px-6 py-3 rounded-xl text-xs md:text-sm shadow-md transition duration-200">
                        <i class="fa-solid fa-circle-exclamation animate-pulse"></i>
                        <span x-show="lang === 'MM'">🚨 တိုင်ကြားစာတင်ရန်</span>
                        <span x-show="lang === 'EN'">🚨 Submit a Complaint</span>
                    </a>
                </div>
            </div>

            <div class="relative md:col-span-7 w-full h-full bg-[#0a1120] overflow-hidden group">
                
                <img x-show="activeSlide === 1" x-transition.opacity src="{{ asset('images/background.jpg') }}" class="w-full h-full object-cover block">
                <img x-show="activeSlide === 2" x-transition.opacity src="{{ asset('images/background.jpg') }}" class="w-full h-full object-cover block">
                <img x-show="activeSlide === 3" x-transition.opacity src="{{ asset('images/background.jpg') }}" class="w-full h-full object-cover block">
                <img x-show="activeSlide === 4" x-transition.opacity src="{{ asset('images/background.jpg') }}" class="w-full h-full object-cover block">
                
                <div class="absolute inset-0 bg-gradient-to-r from-[#0a1120] via-transparent to-transparent hidden md:block z-10"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-[#0a1120]/60 via-transparent to-transparent md:hidden z-10"></div>

                <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-lg bg-black/40 text-white flex items-center justify-center hover:bg-black/70 transition duration-200 border border-white/10">
                    <i class="fa-solid fa-chevron-left text-xl"></i>
                </button>

                <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-lg bg-black/40 text-white flex items-center justify-center hover:bg-black/70 transition duration-200 border border-white/10">
                    <i class="fa-solid fa-chevron-right text-xl"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- ℹ️ 2. ABOUT US SECTION -->
<section id="about" class="py-20 bg-slate-50 text-slate-800 scroll-mt-16" x-data="{ showMore: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                <span x-show="lang === 'MM'">ကျွန်ုပ်တို့အကြောင်း</span>
                <span x-show="lang === 'EN'">About Us</span>
            </h2>
            <div class="w-12 h-1 bg-[#006666] mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="bg-[#006666] rounded-2xl shadow-lg border border-[#004d4d] p-8 md:p-12 mb-8 flex flex-col md:flex-row items-start gap-8 transform hover:scale-[1.01] transition duration-300 text-white">
            <div class="w-16 h-16 md:w-20 md:h-20 bg-white/10 text-white rounded-2xl flex items-center justify-center shrink-0 shadow-md mt-1 border border-white/20">
                <i class="fa-solid fa-circle-info text-3xl md:text-4xl text-teal-200"></i>
            </div>
            <div class="flex-1 space-y-4">
                <p class="text-base md:text-lg text-teal-50/90 leading-relaxed text-justify">
                    <span x-show="lang === 'MM'">ဤစနစ်သည် ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးကော်မတီ (YCDC) ၏ အင်ဂျင်နီယာဌာနများနှင့် မြို့တော်နေပြည်သူလူထုအကြား တိုက်ရိုက်ချိတ်ဆက်ပေးမည့် "ဌာနစုံတိုင်ကြားစာ ပေါင်းစပ်စီမံခန့်ခွဲမှုစနစ် (Municipal Complaint Management System)" ဖြစ်ပါသည်။

ပြည်သူများ နေ့စဉ်ကြုံတွေ့နေရသည့် လမ်းတံတားပျက်စီးမှု၊ ရေနုတ်မြောင်းပိတ်ဆို့၍ ရေကြီးရေလျှံမှုဖြစ်ခြင်း၊ အမှိုက်စွန့်ပစ်မှုစနစ်မကျခြင်းနှင့် မီးပွိုင့်ချို့ယွင်းခြင်း စသည့် မြို့ပြပြဿနာများကို ရှင်းလင်းလွယ်ကူသော ဒစ်ဂျစ်တယ်လမ်းကြောင်းဖြင့် အချိန်နှင့်တစ်ပြေးညီ တိုက်ရိုက်တင်ပြနိုင်ရန် တည်ဆောက်ထားခြင်း ဖြစ်ပါသည်။</span>
                    <span x-show="lang === 'EN'">This platform serves as a centralized Municipal Complaint Management System, establishing a seamless, direct bridge between the engineering departments of the Yangon City Development Committee (YCDC) and the general public.

Our system provides citizens with a streamlined and user-friendly digital gateway to report daily urban challenges in real time. Residents can easily log issues such as damaged roads and bridges, clogged drainage leading to localized flooding, improper waste disposal, and malfunctioning traffic signals.</span>
                </p>
                
            </div>
        </div>

        <div class="text-center mb-12">
            <button @click="showMore = !showMore" class="inline-flex items-center gap-2 px-6 py-3 bg-[#006666] text-white font-semibold rounded-full shadow-md hover:bg-[#004d4d] transition duration-300 transform hover:scale-105">
                <span x-show="!showMore">
                    <span x-show="lang === 'MM'">ဆက်လက်ဖတ်ရှုရန် (See More)</span>
                    <span x-show="lang === 'EN'">See More</span>
                </span>
                <span x-show="showMore">
                    <span x-show="lang === 'MM'">အကျဉ်းချုပ်သိမ်းရန် (See Less)</span>
                    <span x-show="lang === 'EN'">See Less</span>
                </span>
                <i class="fa-solid transition-transform duration-300" :class="showMore ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
            </button>
        </div>

        <div x-show="showMore" x-collapse x-cloak>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-[#006666] p-8 rounded-2xl shadow-md border border-[#004d4d] hover:shadow-lg transform hover:-translate-y-1 transition duration-300 text-white">
                    <div class="w-12 h-12 bg-white/10 text-white rounded-xl flex items-center justify-center mb-6 border border-white/20">
                        <i class="fa-solid fa-eye text-xl text-teal-200"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">
                        <span x-show="lang === 'MM'">မျှော်မှန်းချက် (Our Vision)</span>
                        <span x-show="lang === 'EN'">Our Vision</span>
                    </h3>
                    <p class="text-teal-100 text-sm md:text-base leading-relaxed text-justify">
                        <span x-show="lang === 'MM'">ခေတ်မီဆန်းသစ်သော သတင်းအချက်အလက် နည်းပညာရပ်များကို ထိရောက်စွာ အသုံးချပြီး ရန်ကုန်မြို့တော်ကြီးကို အများပြည်သူနှင့် မြို့တော်စည်ပင်အကြား ပွင့်လင်းမြင်သာမှု အရှိဆုံး၊ အပြန်အလှန် ယုံကြည်မှု အရှိဆုံးနှင့် တုံ့ပြန်ဆောင်ရွက်မှု အမြန်ဆန်ဆုံးသော ဒစ်ဂျစ်တယ်စမတ်စီးတီး (Digital Smart City) ကွန်ရက်တစ်ခုအဖြစ် ကမ္ဘာ့အဆင့်မီ ရာသက်ပန် ဖော်ဆောင်သွားရန် ဖြစ်ပါသည်။</span>
                        <span x-show="lang === 'EN'">To permanently establish Yangon as a world-class, responsive, and highly transparent Digital Smart City. We look forward to a sustainable future where citizen-centric technologies streamline public services, building robust reciprocal trust and ensuring modern urban resilience.</span>
                    </p>
                </div>

                <div class="bg-[#006666] p-8 rounded-2xl shadow-md border border-[#004d4d] hover:shadow-lg transform hover:-translate-y-1 transition duration-300 text-white">
                    <div class="w-12 h-12 bg-white/10 text-white rounded-xl flex items-center justify-center mb-6 border border-white/20">
                        <i class="fa-solid fa-bullseye text-xl text-teal-200"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">
                        <span x-show="lang === 'MM'">ရည်မှန်းချက် (Our Mission)</span>
                        <span x-show="lang === 'EN'">Our Mission</span>
                    </h3>
                    <p class="text-teal-100 text-sm md:text-base leading-relaxed text-justify">
                        <span x-show="lang === 'MM'">ပြည်သူလူထု၏ မြို့ပြအခက်အခဲများကို စက္ကန့်ပိုင်းအတွင်း ဒစ်ဂျစ်တယ်စနစ်ဖြင့် တိုင်ကြားနိုင်မည့် လွယ်ကူသော လမ်းကြောင်းများ ဖန်တီးပေးရန်၊ တစ်ချိန်တည်းမှာပင် စည်ပင်သာယာရေးဌာနများ၏ တာဝန်ယူမှု၊ တာဝန်ခံမှုနှင့် ဝန်ထမ်းများ၏ လုပ်ငန်းစွမ်းဆောင်ရည် အဆင့်ဆင့်ကို အချိန်နှင့်တပြေးညီ တိုင်းတာမြှင့်တင်ပေးရန် ဖြစ်ပါသည်။</span>
                        <span x-show="lang === 'EN'">To break down administrative red tape by granting residents frictionless digital avenues for reporting civic challenges. Concurrently, we aim to accelerate the standard of public accountability, operational productivity, and real-time response rates across all municipal tiers.</span>
                    </p>
                </div>
            </div>

            <div class="relative w-full mt-20 select-none">
                
                <div class="absolute -top-12 -left-20 w-72 h-72 bg-[#006666]/10 rounded-full blur-[100px] pointer-events-none"></div>
                <div class="absolute -bottom-12 -right-20 w-72 h-72 bg-[#006666]/10 rounded-full blur-[100px] pointer-events-none"></div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 relative z-10">
                    
                    <div class="md:col-span-7 bg-[#006666] rounded-3xl p-8 border border-[#004d4d] shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-300 text-white flex flex-col justify-between min-h-[240px]">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-white/10 text-white rounded-2xl flex items-center justify-center border border-white/20">
                                <i class="fa-solid fa-clock text-xl text-teal-200"></i>
                            </div>
                            <span class="text-xs font-mono font-bold uppercase tracking-widest text-teal-200 bg-white/10 px-3 py-1 rounded-full border border-white/10">
                                Availability
                            </span>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-black text-white tracking-tight mb-2">
                                24/7 Accessible
                            </div>
                            <h4 class="text-base font-bold text-teal-100 mb-2">
                                <span x-show="lang === 'MM'">၂၄/၇ အချိန်ပြည့် အသုံးပြုနိုင်မှု</span>
                                <span x-show="lang === 'EN'">Anytime Reporting Platform</span>
                            </h4>
                            <p class="text-xs md:text-sm text-teal-50/80 leading-relaxed text-justify">
                                <span x-show="lang === 'MM'">ရုံးပိတ်ရက်နှင့် ရုံးချိန်ကန့်သတ်ချက်များမရှိဘဲ မိမိတို့ကြုံတွေ့ရသည့် မြို့ပြအခက်အခဲများကို မိမိတို့၏ စမတ်ဖုန်းများမှတစ်ဆင့် အချိန်မရွေး လွယ်ကူလျင်မြန်စွာ အွန်လိုင်းမှ တင်ပြတိုင်ကြားနိုင်ပါသည်။</span>
                                <span x-show="lang === 'EN'">Accessible anytime, anywhere. Eliminates the barriers of official office hours and public holidays, allowing residents to file and track municipal reports seamlessly 24/7 from any device.</span>
                            </p>
                        </div>
                    </div>

                    <div class="md:col-span-5 bg-[#006666] rounded-3xl p-8 border border-[#004d4d] shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-300 text-white flex flex-col justify-between">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-white/10 text-white rounded-2xl flex items-center justify-center border border-white/20">
                                <i class="fa-solid fa-location-dot text-xl text-teal-200"></i>
                            </div>
                            <span class="text-xs font-mono font-bold uppercase tracking-widest text-teal-200 bg-white/10 px-3 py-1 rounded-full border border-white/10">
                                Geospatial
                            </span>
                        </div>
                        <div>
                            <div class="text-2xl md:text-3xl font-black text-white tracking-tight mb-1">
                                Live GPS Tracking
                            </div>
                            <h4 class="text-sm font-bold text-teal-100 mb-1.5">
                                <span x-show="lang === 'MM'">တိကျသော ကွင်းဆင်းတည်နေရာစနစ်</span>
                                <span x-show="lang === 'EN'">Geospatial Verification</span>
                            </h4>
                            <p class="text-xs text-teal-50/80 leading-relaxed text-justify">
                                <span x-show="lang === 'MM'">တိုင်ကြားချက်တိုင်းတွင် Google Map Geo-Coordinates Sနစ် တိကျစွာ ပါဝင်သဖြင့် ဝန်ထမ်းများ မြေပြင်ကွင်းဆင်း စစ်ဆေးပြုပြင်ရာတွင် လွယ်ကူလျင်မြန်စေပါသည်။</span>
                                <span x-show="lang === 'EN'">Every submission maps exact user coordinates to provide on-ground engineering teams with flawless geospatial context for rapid target deployment.</span>
                            </p>
                        </div>
                    </div>

                    <div class="md:col-span-12 bg-gradient-to-r from-[#006666] to-[#004d4d] text-white rounded-3xl p-8 md:p-10 border border-[#004d4d] shadow-xl hover:shadow-lg transition duration-300 flex flex-col md:flex-row items-start md:items-center gap-6">
                        <div class="w-14 h-14 bg-white/10 text-white rounded-2xl flex items-center justify-center border border-white/20 shrink-0 shadow-inner">
                            <i class="fa-solid fa-shield-halved text-2xl text-teal-200"></i>
                        </div>
                        <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                            <div class="md:col-span-1">
                                <div class="text-2xl md:text-3xl font-black text-white tracking-tight mb-1">
                                    Secure & Encrypted
                                </div>
                                <h4 class="text-sm font-bold text-teal-200">
                                    <span x-show="lang === 'MM'">ကိုယ်ရေးအချက်အလက် လုံခြုံမှု</span>
                                    <span x-show="lang === 'EN'">Data Privacy Guaranteed</span>
                                </h4>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-xs md:text-sm text-teal-50/80 leading-relaxed text-justify border-t border-white/10 md:border-t-0 md:border-l border-white/20 pt-3 md:pt-0 md:pl-6">
                                    <span x-show="lang === 'MM'">ပြည်သူလူထု၏ ကိုယ်ရေးအချက်အလက်များနှင့် တိုင်ကြားချက်မှတ်တမ်းသမိုင်း (History) များကို နောက်ဆုံးပေါ် End-to-End Encryption စနစ်များဖြင့် ခိုင်မာစွာ ကာကွယ်သိမ်းဆည်းထားသဖြင့် သတင်းအချက်အလက် ယိုစိမ့်မှုမရှိစေရန် အပြည့်အဝ တာဝန်ယူပါသည်။</span>
                                    <span x-show="lang === 'EN'">Enforces industry-leading data protection standards. Personal data layers and communication histories are thoroughly encrypted, preventing identity disclosure and preserving end-to-end infrastructure integrity.</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section id="departments" class="py-24 bg-slate-50 relative overflow-hidden" 
         x-data="{ 
            activeDept: 1,
            openTasks: null, // လက်ရှိဖွင့်ထားသော ဌာန၏ တာဝန်များကို သိမ်းရန်
            departments: [
                { 
                    id: 1, 
                    icon: 'fa-building', 
                    name: 'ကော်မတီရုံး', 
                   
                    tasks: [
                        'ကော်မတီ၏ ဦးစီးလုပ်ငန်းများ ဆောင်ရွက်ခြင်း။',
                            'စီမံခန့်ခွဲရေးနှင့် ထောက်ပံ့ရေးဆိုင်ရာ ကိစ္စရပ်များအား ဆောင်ရွက်ခြင်း။',
                            'ကော်မတီ၏ အစည်းအဝေးမှတ်တမ်းများအား ပြုစုဝေငှခြင်း၊ ထိန်းသိမ်းခြင်း။',
                            'ဝန်ထမ်းများနှင့်ပတ်သက်၍ ရှေးဦးစုံစမ်းစစ်ဆေးခြင်း၊ ဌာနဆိုင်ရာ စုံစမ်းစစ်ဆေးခြင်းအဖွဲ့များ ဖွဲ့စည်းခြင်း။',
                            'ရှေးဦးစုံစမ်းစစ်ဆေးခြင်း၊ ဌာနဆိုင်ရာ စုံစမ်းစစ်ဆေးခြင်းအဖွဲ့များ၏ ဆုံးဖြတ်ချက်အရ အရေးယူရန် ကော်မတီသို့ တင်ပြမည့် ကိစ္စရပ်များအား အမှာစာဖြင့် တင်ပြခြင်း။',
                            'အထက်အဖွဲ့အစည်းများမှ ချမှတ်ပေးသည့် မူဝါဒဆိုင်ရာကိစ္စရပ်များ၊ ကော်မတီရုံးမှ အထက်အဖွဲ့အစည်းများသို့ တင်ပြရန်ကိစ္စများအား ဆက်သွယ်ပေးပို့ တင်ပြဆောင်ရွက်ခြင်း။',
                            'အမိန့်ကြော်ငြာစာများ၊ အမိန့်ညွှန်ကြားချက်များ၊ ညွှန်ကြားလွှာများ ထုတ်ပြန်ခြင်းများကို ကြီးကြပ်ဆောင်ရွက်ခြင်း။',
                            'ဥက္ကဋ္ဌ၊ အတွင်းရေးမှူး၊ တွဲဖက်အတွင်းရေးမှူး(ဌာနကြီးမှူး)နှင့် ကော်မတီဝင်များမှ ပေးအပ်သည့် တာဝန်များကို ဆောင်ရွက်ခြင်း။',
                            'ကော်မတီနှင့် ဌာနများ၊ အုပ်ချုပ်ရေးရုံးများသို့ ဆက်သွယ်ဆောင်ရွက်ခြင်း။',
                            'ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးကော်မတီမှ လွှင့်တင်ထားသော Website တွင် ဌာနအသီးသီး၏ လုပ်ငန်းတာဝန်နှင့် ဆောင်ရွက်မှုများအား ထည့်သွင်းဖော်ပြပေးခြင်း။',
                            'အများပြည်သူနှင့် ကမ္ဘာမှ သိသင့်သိထိုက်သော အချက်အလက်များအား ဌာန Website မှ Internet သို့ ချိတ်ဆက်တင်ပြခြင်း။',
                            'ကော်မတီ၏ မူဝါဒ၊ သတင်း၊ လုပ်ဆောင်ချက်များအား အများပြည်သူများ သိရှိနိုင်စေရန် သတင်းမီဒီယာများမှ ဖော်ပြပေးနိုင်ရန် ဆောင်ရွက်ခြင်း။',
                            'ကော်မတီ၏ ICT လုပ်ငန်း၊ နည်းပညာများအဆင့်မြင့်မားတိုးတက်လာစေရေး စီမံဆောင်ရွက်ခြင်း။',
                            'ကော်မတီ၏မူဝါဒ၊ လမ်းညွန်ချက်များနှင့်အညီ စည်ပင်သာယာရေးလုပ်ငန်းများ၊ နှစ်နိုင်ငံချစ်ကြည်ရေးကိစ္စနှင့်ပတ်သက်၍ နိုင်ငံခြားဆက်ဆံရေးလုပ်ငန်းများဆောင်ရွက်ခြင်းနှင့် နိုင်ငံတကာဆက်ဆံရေးကိစ္စရပ်များ ဆောင်ရွက်ခြင်း။'
                    ]
                },
                { 
                    id: 2, 
                    icon: 'fa-folder-open', 
                    name: 'စီမံရေးရာဌာန', 
                 
                    tasks: [
                       'ဖွဲ့စည်းပုံရေးဆွဲခြင်း၊ ရာထူးတီထွင်ခြင်း၊ ဝန်ထမ်းများစတင်ခန့်ထားခြင်း၊ အတည်ပြုခန့်ထားခြင်း၊ ရာထူးတိုးမြှင့်ခန့်ထားခြင်း၊ ပြောင်းရွှေ့ခန့်ထားခြင်း။',
                            'ဝန်ထမ်းများခွင့်ခံစားခြင်း၊ အငြိမ်းစားယူခြင်း၊ အငြိမ်းစားဝန်ထမ်းကို ဘဏ္ဍာရေးနှစ်အလိုက်ခန့်ထားခြင်း၊ ကျွမ်းကျင်ပညာရှင်များခန့်ထားခြင်း။',
                            'ဝန်ထမ်းများ၏ အမှုထမ်းသက်မှတ်တမ်း၊ ဝန်ထမ်းအင်အားစာရင်းများကို ထိန်းသိမ်းခြင်း၊ စိစစ်ခြင်း၊ ကိုယ်ရေးအကျဉ်းမှတ်တမ်း၊ အမှုထမ်းများ၏ အတွင်းရေးအစီရင်ခံစာများ၊ ကိုယ်ရေးအရည်အချင်းမှတ်တမ်းများ ထိန်းသိမ်းခြင်း။',
                            'သင်တန်းများစေလွှတ်ခြင်းနှင့် နိုင်ငံတော်မှချီးမြှင့်သည့် ဂုဏ်ထူး၊ ဘွဲ့ထူးလက်မှတ်၊ ဆုတံဆိပ်များရရှိစေရန် ထောက်ခံတင်ပြခြင်း။',
                            'ဝန်ထမ်းများ ရာထူးမှခေတ္တချထားခြင်း၊ ပြန်လည်ခန့်ထားခြင်း၊ ရာထူးမှရပ်စဲခြင်း၊ ထုတ်ပယ်ခြင်း၊ ထုတ်ပစ်ခြင်း။',
                            'မြို့တော်နယ်နိမိတ်အတွင်းရှိ မြို့နယ်တရားရုံး(စည်ပင်သာယာ)၊ မြို့နယ်ဥပဒေရုံး(စည်ပင်သာယာ) ဖွင့်လှစ်ခြင်း၊ ကြီးကြပ်ခြင်း။',
                            'မြို့တော်သူမြို့တော်သားများအား မြို့တော်အင်္ဂါရပ်နှင့်အညီ နေထိုင်ကြစေရန် စည်းရုံးခြင်း၊ စည်ပင်သာယာလုပ်ငန်းများအကြောင်း သိကောင်းစရာများကို ပြည်သူတို့ကျယ်ပြန့်စွာ သိရှိနားလည်စေရန် သတင်းပြန်ကြားခြင်းနှင့် ပြည်သူ့အခက်အခဲများကို ပြန်ကြားဖြေရှင်းပေးခြင်း။',
                            'မြို့တော်နယ်နိမိတ်အတွင်း လုပ်ငန်းလိုင်စင်များ၊ တည်းခိုခန်းလိုင်စင်၊ ဘော်ဒါဆောင်လိုင်စင်၊ ကိုယ်ပိုင်ဈေးလိုင်စင်နှင့် ယာဉ်ဖြင့်လှည့်လည်ရောင်းချခွင့်လိုင်စင်များ စိစစ်ခွင့်ပြုခြင်း၊ ပယ်ဖျက်ခြင်း၊ ယာယီဇာတ်ရုံများဆောက်လုပ်ခွင့်ပြုခြင်းနှင့် စည်းကမ်းချက်များ သတ်မှတ်ခြင်း။',
                            'မြို့တော်နယ်နိမိတ်အတွင်းရှိ ခရိုင်နှင့် မြို့နယ်စည်ပင်သာယာအုပ်ချုပ်ရေးမှူးရုံးများ၊ ကော်မတီကဖွင့်လှစ်သော သင်တန်းကျောင်းများ၊ ဝန်ထမ်းအိမ်ရာများ နေရာချထားခြင်းနှင့် စည်းကမ်းထိန်းသိမ်းရေးတို့ကို ကြီးကြပ်ကွပ်ကဲခြင်း။',
                            'လမ်းဘေးဈေးဆိုင်နှင့် လမ်းဘေးဈေးသည်များနှင့် ပတ်သက်၍ကြီးကြပ်ခြင်း၊ စည်းကမ်းချက်များ၊ နေရာနှင့် အချိန်ကာလ သတ်မှတ်ခြင်း။',
                            'လိုင်စင် သို့မဟုတ် ခွင့်ပြုချက်မရှိဘဲ လုပ်ကိုင်ဆောင်ရွက်နေသော ကိုယ်ပိုင်ဈေးများနှင့် နေရာများကို စစ်ဆေးတွေ့ရှိပါက အရေးယူခြင်း။',
                            'တည်းခိုခန်း၊ ဟိုတယ်၊ မိုတယ်၊ ဧည့်ဂေဟာနှင့် တည်းခိုရိပ်သာများအား ဟိုတယ်နှင့်ခရီးသွားလာရေးဝန်ကြီးဌာနနှင့် ညှိနှိုင်း၍ စစ်ဆေးခြင်း၊ အရေးယူခြင်း။',
                            'လုပ်ငန်းလိုင်စင် သက်တမ်းတိုးမြှင့်ခြင်း၊ လုပ်ငန်းအမည်ပြောင်းခြင်း၊ လိပ်စာပြောင်းခြင်း၊ ပိုင်ဆိုင်မှုလွှဲပြောင်းခြင်း၊ လုပ်ငန်းအမျိုးအစားပြောင်းခြင်း၊ ပူးပေါင်းခြင်းနှင့် ခွဲခြားခြင်းများကို စိစစ်ခွင့်ပြုခြင်း။',
                            'မြို့နယ်ရုံးများတွင် အကြောင်းအမျိုးမျိုးကြောင့် ကောက်ခံမရနိုင်သော အခွန်အခများကို ပယ်ဖျက်ခြင်းနှင့် စာရင်းမှ လျှော့ချနိုင်ရေး ဆောင်ရွက်ခြင်း။',
                            'ယာယီစီးပွားရေးစုပုံလုပ်ငန်းများအား ယာယီခွင့်ပြုခြင်း၊ ကြီးကြပ်ခြင်းနှင့် စည်းကမ်းချက်များ သတ်မှတ်ခြင်း၊ ပြင်ဆင်ခြင်း။',
                            'ကော်မတီက ခွင့်ပြုတာဝန်ပေးအပ်ထားသည့် ဆိုင်/မြေများ အငှားချထားခြင်းလုပ်ငန်းများ ဆောင်ရွက်ခြင်း။',
                            'နိုင်ငံတော်၏ နေ့ကြီးရက်ကြီး ပွဲလမ်းသဘင် အခမ်းအနားများတွင် ကော်မတီကိုယ်စား ပါဝင်ဆောင်ရွက်ခြင်း။',
                            'ဝန်ထမ်းသင်တန်းကျောင်း မှတစ်ဆင့် စာရေးဝန်ထမ်းသင်တန်း၊ အခြေခံစာရင်းကိုင်သင်တန်း၊ စာရေးဝန်ထမ်းကြီးကြပ်မှုသင်တန်း၊ စာရင်းကိုင်မွမ်းမံသင်တန်း၊ အင်ဂျင်နီယာမွမ်းမံသင်တန်းနှင့် စီမံခန့်ခွဲရေးသင်တန်းများကို စနစ်တကျ လေ့ကျင့်သင်ကြားပေးခြင်း။'
                    ]
                },
                { 
                    id: 3, 
                    icon: 'fa-wallet', 
                    name: 'ဘဏ္ဍာရေးနှင့်ငွေစာရင်းဌာန', 
                  
                    tasks: [
                        'ကော်မတီရှိ ဌာနများနှင့် ညှိနှိုင်းရေးဆွဲထားသော နှစ်စဉ်အရအသုံး ခန့်မှန်းခြေငွေစာရင်းကို စုစည်း၍ ကော်မတီသို့ တင်ပြခွင့်ပြုချက်ရယူခြင်း။',
                            'နှစ်စဉ်အရအသုံးခန့်မှန်းခြေငွေစာရင်းများကို ရန်ကုန်တိုင်းဒေသကြီး ရသုံးမှန်းခြေငွေစာရင်းဦးစီးဌာနမှတစ်ဆင့် အစိုးရအဖွဲ့သို့ တင်ပြနိုင်ရေး ဆောင်ရွက်ခြင်း။',
                            'ဘဏ္ဍာငွေအရ၊ အသုံးဆိုင်ရာဥပဒေတွင် ကော်မတီအတွက် အတည်ပြုသတ်မှတ်ထားသော နှစ်စဉ်အရအသုံးခန့်မှန်းခြေငွေစာရင်းအရ ဌာနအသီးသီး၏ လျာထားငွေစာရင်းများကို ပြုစုထုတ်ပြန်ခြင်း။',
                            'ခွင့်ပြုရန်ပုံငွေများအရ သုံးစွဲမှုများကို စိစစ်ခြင်း၊ ရန်ပုံငွေလွှဲပြောင်းသုံးစွဲမှုများနှင့် ဖြည့်စွက်ခွင့်ပြုငွေတောင်းခံမှုများကို စိစစ်တင်ပြခြင်း။',
                            'နိုင်ငံခြားသုံးငွေလျာထားချက် စာရင်းပြုစုရေးဆွဲခြင်း၊ ရငွေများကို ကော်မတီရန်ပုံငွေသို့ ပေးသွင်းခြင်း၊ နိုင်ငံခြားသုံးငွေ သုံးစွဲခွင့် (FE Permit) လျှောက်ထားရယူခြင်းနှင့် စာရင်းထိန်းသိမ်းခြင်း။',
                            'ဌာနအသီးသီးမှ တင်ပြတောင်းခံသည့် အသုံးစရိတ်ငွေတောင်းခံလွှာများ၊ ကြိုတင်ငွေတောင်းခံလွှာများ၊ ဝန်ထမ်းများ၏ လစာနှင့် ခရီးစရိတ်ငွေတောင်းခံလွှာများကို စစ်ဆေးပေးရှင်းခြင်း။',
                            'အငြိမ်းစားဝန်ထမ်းများ၏ ပင်စင်လစာနှင့် လုပ်သက်ဆုငွေများ ခံစားခွင့်ရရှိရေးအတွက် ပင်စင်အမှုတွဲများကို စစ်ဆေးတွက်ချက်ပြီး ထုတ်ပေးခြင်း၊ လစဉ်ပင်စင်လစာငွေများကို ဘဏ်များသို့ ပေးသွင်းခြင်းနှင့် ငွေသားထုတ်ပေးခြင်း။',
                            'ဘတ်ဂျက်နှင့်ငွေစာရင်းဌာနမှ တာဝန်ခံကောက်ခံသည့် ဘီးခွန်ဝင်ငွေများကို သက်ဆိုင်ရာလက်ခံစခန်းများအလိုက် စနစ်တကျကောက်ခံ၍ ဘဏ်သို့ပေးသွင်းခြင်းနှင့် စာရင်းထိန်းသိမ်းခြင်း။',
                            'ကော်မတီကခွင့်ပြုထားသည့် ပြည်တွင်းပြည်ပ ပစ္စည်းဝယ်ယူရေးလုပ်ငန်းများ ဆောင်ရွက်ခြင်း၊ သွင်းကုန်လိုင်စင်လျှောက်ထားခြင်း၊ ချစ်ကြည်ရေးလုပ်ငန်းများနှင့် ဆိပ်ကမ်းရှင်းလင်းခြင်းများကို တာဝန်ခံဆောင်ရွက်ခြင်း။',
                            'ကော်မတီ၏ဌာန၊ ရုံးများမှ ကောက်ခံရရှိသော အခွန်နှင့်ဝင်ငွေအရပ်ရပ်ဆိုင်ရာ စာရင်းများကို စစ်ဆေးခြင်း၊ အတွင်းစာရင်းစစ်အဖွဲ့များဖြင့် ဘဏ္ဍာရေးစည်းမျဉ်းများနှင့် ညီညွတ်မှု ရှိမရှိ စစ်ဆေးခြင်း။',
                            'ငွေစာရင်းထိန်းသိမ်းရေးနည်းလမ်းညွှန်ကြားချက်များနှင့်အညီ လစဉ်စာရင်းနှင့် ဘဏ္ဍာရေးအစီရင်ခံစာများ ပြုစုတင်ပြခြင်း၊ နှစ်ချုပ်စာရင်းများ ရေးဆွဲပြီး ရန်ကုန်တိုင်းဒေသကြီး စာရင်းစစ်ချုပ်ရုံး၏ စစ်ဆေးမှုကို ခံယူခြင်း။',
                            'ကော်မတီ၏ နှစ်စဉ်၊ နှစ်တို၊ နှစ်ရှည်စီမံကိန်းရည်မှန်းချက်များအား ပြုစုရေးဆွဲပြီး အစိုးရအဖွဲ့သို့ တင်ပြခြင်း။'
                    ]
                },
                { 
                    id: 4, 
                    icon: 'fa-calculator', 
                    name: 'ရာပြတ်ဌာန', 
                  
                    tasks: [
                        'ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးကော်မတီ နယ်နိမိတ်အတွင်းရှိ ပုဂ္ဂလိကနှင့် အစိုးရဌာနဆိုင်ရာပိုင် မရွှေ့မပြောင်းနိုင်သော မြေနှင့်အဆောက်အအုံများအပေါ် သတ်မှတ်သောရာခိုင်နှုန်းများဖြင့် ပစ္စည်းခွန်များ စည်းကြပ်ဆောင်ရွက်ခြင်း။',
                            'လူနေထိုင်ရုံသက်သက်အသုံးပြုသော မြေနှင့်အဆောက်အအုံများ၊ အခန်းများကို စည်းကြပ်ခြင်း။',
                            'စက်ရုံ၊ အလုပ်ရုံများ၊ စက်သုံးဆီအရောင်းဆိုင်များနှင့် စက်မှုဇုန်အတွင်းရှိ မြေနှင့်အဆောက်အအုံများကို စည်းကြပ်ခြင်း။',
                            'ဟိုတယ်၊ မိုတယ်၊ အင်း၊ တည်းခိုရိပ်သာများအား ပစ္စည်းခွန်စည်းကြပ်ခြင်း။',
                            'Apartment, Tower, Residence, Plaza နှင့် အခကြေးငွေရယူ၍ ငှားရမ်းထားသော မြေ၊ အဆောက်အအုံ, အခန်းများကို စည်းကြပ်ခြင်း။',
                            'ကိုယ်ပိုင်စီးပွားရေးလုပ်ငန်းလုပ်ကိုင်သော နေရာများနှင့် အစိုးရဌာနဆိုင်ရာပိုင်/အဖွဲ့အစည်းများပိုင် မြေနှင့် အဆောက်အအုံများကို စည်းကြပ်ခြင်း။',
                            'မြန်မာ့ဆိပ်ကမ်းအာဏာပိုင်အား ပစ္စည်းခွန်စည်းကြပ်ခြင်း။',
                            'ပစ္စည်းခွန်များ စည်းကြပ်ရန်အလို့ငှာ သက်ဆိုင်ရာနေရာများအား ကွင်းဆင်းစစ်ဆေးစိစစ်၍ လိုအပ်သော အချက်အလက်၊ အထောက်အထားများ တောင်းခံရယူခြင်း။',
                            'စည်းကြပ်တွက်ချက်အတည်ပြုပြီးသော ပစ္စည်းခွန်အား အခွန်ထမ်းပြည်သူများ ပေးဆောင်နိုင်ရန် အကြောင်းကြားခြင်းနှင့် ရုံးလုပ်ငန်းဆိုင်ရာ ကူညီဆောင်ရွက်ပေးခြင်း။',
                            'ပစ္စည်းခွန်အသစ်စည်းကြပ်ရန်နှင့် ပြင်ဆင်/ပယ်ဖျက်ရန် လိုအပ်သည်များကို ကွင်းဆင်းစစ်ဆေးဆောင်ရွက်ခြင်း။',
                            'ပစ္စည်းခွန်ပေးဆောင်ရန် ကျန်ရှိသူများကို ဆက်သွယ်အကြောင်းကြားခြင်း၊ ခေါ်ယူဆွေးနွေးခြင်း၊ အသိပညာပေးခြင်းနှင့် အခွန်ငွေပေးဆောင်စေခြင်း။',
                            'ဘဏ္ဍာရေးနှစ်အလိုက် သတ်မှတ်လျာထားချက်များ ပြည့်မီကျော်လွန်ရေးအတွက် တည်ဆဲဥပဒေ၊ နည်းဥပဒေများနှင့်အညီ လိုက်နာဆောင်ရွက်ခြင်း။',
                            'လိုအပ်သောအထောက်အထားများနှင့် တင်ပြလာသော အခွန်ထမ်းများအား အခွန်ထမ်းအမည် ပြောင်းလဲပေးခြင်း။',
                            'အဆောက်အအုံများအား တိကျသော လိပ်စာနံပါတ် သတ်မှတ်ပေးခြင်း။'
                    ]
                },
                { 
                    id: 5, 
                    icon: 'fa-bridge', 
                    name: 'အင်ဂျင်နီယာဌာန (လမ်းနှင့်တံတား)', 
                   
                    tasks: [
                        'ရန်ကုန်မြို့တော်စည်ပင်သာယာနယ်နိမိတ်အတွင်းရှိ လမ်းများ၊ တံတားများ၊ မြေအောက်ဥမင်များ၊ လူသွားစင်္ကြန်များ၊ နောက်ဖေးလမ်းကြားများ၊ ရေမြောင်းများ၊ ရေထုတ်ပြွန်များနှင့် စက်ဘီးလမ်းများ တည်ဆောက်ခြင်းနှင့် ပြုပြင်ဆင်ထိန်းသိမ်းခြင်း။',
                            'လမ်းများတွင် ယာဉ်အန္တရာယ်၊ လမ်းအန္တရာယ်ကင်းရှင်းရေးနှင့် လူများအဆင်ပြေစွာ သွားလာနိုင်ရေးအတွက် လမ်းဆေးအမှတ်အသားများ ရေးဆွဲခြင်း၊ အချက်ပြမီးပွိုင့်နှင့် လမ်းညွှန်ဆိုင်းဘုတ်များ တပ်ဆင်ပြုပြင်ထိန်းသိမ်းခြင်း။',
                            'ယာဉ်အန္တရာယ်ကင်းရှင်းစေရေးအတွက် လိုအပ်သည့်နေရာများတွင် လမ်းအား ယာယီပိတ်ခြင်းနှင့် အချိန်ပိုင်းလမ်းရှင်းစနစ် ဆောင်ရွက်ခြင်း။',
                            'မော်တော်ယာဉ်များ သွားလာမှု လွယ်ကူစေရန်နှင့် ယာဉ်အန္တရာယ်ကင်းရှင်းစေရန်အတွက် ယာဉ်ကြောစီမံခန့်ခွဲမှုအစီအမံများ ဆောင်ရွက်ပေးခြင်း။',
                            'ဘတ်စ်ကားလိုင်းများသွားရာလမ်းကြောင်း၊ စက်ဘီးလမ်းကြောင်းနှင့် ဘတ်စ်ကားမှတ်တိုင်များ နေရာသတ်မှတ်ပေးခြင်းနှင့် ပြောင်းရွှေ့ခြင်းတို့ကို စီမံဆောင်ရွက်ခြင်း။',
                            'လိုအပ်သည့်လမ်းများအား တစ်လမ်းမောင်းအဖြစ် သတ်မှတ်ပေးခြင်းနှင့် ကုန်တင်ယာဉ်ကြီးများ အချိန်ပိုင်းဖြင့် ဝင်ရောက်နိုင်ရန် စီစဉ်ဆောင်ရွက်ပေးခြင်း။',
                            'ခြေလျင်လျှောက်သူများ ဘေးအန္တရာယ်မဖြစ်စေရန် ခုံးကျော်တံတားများ၊ မြေအောက်လမ်းကူးလူသွားဥမင် (Underpass) များ ဆောက်လုပ်ပေးခြင်းနှင့် လမ်းမကြီးများတွင် အကာအရံများ တပ်ဆင်ခြင်း။',
                            'ဆိုက်ကား၊ စက်ဘီး၊ လက်တွန်းလှည်းနှင့် အနှေးယာဉ်များကြောင့် ယာဉ်ကြောပိတ်ဆို့မှုမဖြစ်စေရန် ကန့်သတ်စီမံဆောင်ရွက်ပေးခြင်း။',
                            'လုပ်ငန်းသုံးပစ္စည်းနှင့် စက်ယန္တရားများအား မှာယူခြင်း၊ သိုလှောင်ခြင်းနှင့် ကတ္တရာကွန်ကရိ၊ ဘိလပ်မြေကွန်ကရိ၊ ကွန်ကရိကမြှုံး၊ ကွန်ကရိကျောက်ပြားနှင့် Interlock များ ထုတ်လုပ်ဖြန့်ဝေခြင်း။',
                            'ကုန်တင်ယာဉ်ကြီးများ၊ အဝေးပြေးခရီးသည်တင်ယာဉ်များ၊ အငှားယာဉ်များ စနစ်တကျရပ်နားစေရေးအတွက် ယာဉ်ရပ်နားစခန်းများနှင့် ယာဉ်ရပ်နားရန်နေရာများ ရွေးချယ်သတ်မှတ်တည်ဆောက်ပေးခြင်း။',
                            'လမ်းနယ်နိမိတ်အတွင်း အခြားဌာနများမှ ရေပိုက်သွယ်တန်းခြင်း၊ လျှပ်စစ်မီးကြိုး/ဆက်သွယ်ရေးကြိုးများ မြေပေါ်မြေအောက် သွယ်တန်းခြင်းလုပ်ငန်းများကို စည်းမျဉ်းများနှင့်အညီ စိစစ်ခွင့်ပြုပေးခြင်းနှင့် ကြီးကြပ်ခြင်း။',
                            'အဝေးပြေးယာဉ်ရပ်နားစခန်းများ၊ ယာဉ်ရောင်းဝယ်ရေးစခန်းများ၊ ယာဉ်မောင်းသင်ကွင်းများနှင့် ဌာနမှစီမံခန့်ခွဲသော ဆိုင်ခန်း/မြေနေရာများမှ သတ်မှတ်ထားသည့် အခွန်အခများ ကောက်ခံခြင်း။'
                    ]
                },
                { 
                    id: 6, 
                    icon: 'fa-building-shield', 
                    name: 'အင်ဂျင်နီယာဌာန (အဆောက်အအုံ)', 
                  
                    tasks: [
                       'ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးကော်မတီအတွက် နှစ်တိုနှစ်ရှည် ဆောက်လုပ်ရေးကဏ္ဍစီမံကိန်းများ ရေးဆွဲတင်ပြခြင်းနှင့် မြို့ပြစီမံကိန်းများ ရေးဆွဲရာတွင် ပါဝင်ဆောင်ရွက်ခြင်း။',
                            'ကျူးကျော်တဲများကို သက်ဆိုင်ရာဌာနများနှင့် ညှိနှိုင်းစစ်ဆေးအရေးယူခြင်း၊ ကော်မတီပိုင်မြေနှင့် အဆောက်အအုံများကို Сီမံခန့်ခွဲခြင်း၊ မှတ်ပုံတင်ခြင်းနှင့် ဝန်ထမ်းအိမ်ရာများကို ကြီးကြပ်ထိန်းသိမ်းခြင်း။',
                            'နယ်နိမိတ်အတွင်းရှိ ဆောက်လုပ်သည့် အဆောက်အအုံများနှင့်ပတ်သက်၍ တည်ဆဲဥပဒေ၊ နည်းဥပဒေများနှင့်အညီ စစ်ဆေး၍ ဆောက်လုပ်ခွင့်ပြုခြင်း၊ ငြင်းပယ်ခြင်း သို့မဟုတ် ဆိုင်းငံ့ခြင်း။',
                            'အဆောက်အအုံများ တည်ဆောက်ရာတွင် မြို့တော်အင်္ဂါရပ်နှင့်အညီ ဆောက်လုပ်ရန် လမ်းညွှန်ခြင်း၊ စစ်ဆေးခြင်းနှင့် ကြမ်းခင်းဧရိယာ/နေထိုင်ရမည့် လူဦးရေ သတ်မှတ်ပေးခြင်း။',
                            'အဆောက်အအုံဆောက်လုပ်ရန် ခွင့်ပြုချက်မရှိသော သို့မဟုတ် ခွင့်ပြုပုံစံနှင့် ညီညွတ်မှုမရှိသော အဆောက်အအုံများကို ဖျက်သိမ်းခြင်း၊ တရားစွဲဆိုခြင်းနှင့် စနစ်တကျဖြစ်စေရန် စိစစ်ခွင့်ပြုခြင်း။',
                            'ခွင့်ပြုချက်ဖြင့် ဆောက်လုပ်ပြီးစီးသော အဆောက်အအုံများအပေါ် တက်ရောက်နေထိုင်ခွင့် (BCC) သို့မဟုတ် အသုံးပြုခွင့် လျှောက်ထားချက်များကို စစ်ဆေးခွင့်ပြုခြင်း။',
                            'အန္တရာယ်ဖြစ်စေနိုင်သော အဆောက်အအုံဟောင်းများကို စစ်ဆေးခြင်း၊ ပြုပြင်ဆောင်ရွက်စေခြင်း၊ ဖျက်သိမ်းဖယ်ရှားရန်နှင့် အသစ်ပြန်လည် တည်ဆောက်စေရန် ညွှန်ကြားခြင်း။',
                            'မှတ်ပုံတင်လက်မှတ်ရ အင်ဂျင်နီယာ/ဗိသုကာများ၊ လိုင်စင်ရကန်ထရိုက်တာများ၊ မြေသားစမ်းသပ်မှုလုပ်ငန်းများနှင့် Pile ရိုက်ခြင်းလုပ်ငန်းများအား လိုင်စင်ထုတ်ပေးခြင်း၊ သက်တမ်းတိုးခြင်း၊ ငြင်းပယ်ခြင်း၊ အရေးယူခြင်းနှင့် Blacklist သွင်းခြင်းများ ဆောင်ရွက်ခြင်း။',
                            'ကော်မတီပိုင်မြေကွက်များပေါ်တွင် အဆောက်အအုံအစိတ်အပိုင်းများ ကျူးကျော်ခြင်းနှင့် ဆောက်လုပ်ရေးပစ္စည်းများ စုပုံထားရှိခြင်းများကို စစ်ဆေးခြင်း၊ အခွန်ကောက်ခံခြင်းနှင့် ဖျက်သိမ်းခြင်း။'
                    ]
                },
                { 
                    id: 7, 
                    icon: 'fa-faucet-drip', 
                    name: 'အင်ဂျင်နီယာဌာန (ရေနှင့်သန့်ရှင်းမှု)',
                   
                    tasks: [
                       'ရေအရင်းအမြစ်များ၊ ရေသန့်စင်စက်ရုံများနှင့် ရေဆိုးသန့်စင်စက်များ၏ ကြံ့ခိုင်ရေးနှင့် လုံခြုံရေးဆိုင်ရာကိစ္စရပ်များ စီမံဆောင်ရွက်ခြင်း။',
                            'တိုးတက်လာသော မြို့တော်နေလူဦးရေအား လုံလောက်စွာရေပေးဝေနိုင်ရေးအတွက် ရေအရင်းအမြစ်အသစ်များ ဖော်ထုတ်အသုံးပြုခြင်းနှင့် ရေဆိုးသန့်စင်စွန့်ပစ်မှုများ စီမံဆောင်ရွက်ခြင်း။',
                            'ကမ္ဘာ့ကျန်းမာရေးအဖွဲ့ (WHO) ၏ စံချိန်စံညွှန်းနှင့် ညီညွတ်သော ရေကောင်းရေသန့်များ ပေးဝေနိုင်ရေးအတွက် ရေအရည်အသွေးနှင့် စွန့်ပစ်ရေဆိုးအရည်အသွေးများအား စီမံခန့်ခွဲခြင်း။',
                            'ရေတွန်းစက်ကြီးများ၊ ရေသန့်စင်စက်ရုံများနှင့် ရေဆိုးသန့်စင်စက်ရုံများအား စွမ်းအားပြည့် မောင်းနှင်နိုင်ရေး စီမံဆောင်ရွက်ခြင်း၊ ပြင်ဆင်ထိန်းသိမ်းခြင်းနှင့် တိုးချဲ့တပ်ဆင်ခြင်း။',
                            'ရေပို့ပိုက်မကြီးများ၊ ရေဖြန့်ဝေပိုက်မကြီးများ၊ DMA Network များ၊ Service Reservoir များနှင့် ရေဆိုးပိုက်လိုင်းကွန်ရက်များ၏ ကြံ့ခိုင်ရေးကို စီမံဆောင်ရွက်ခြင်း။',
                            'ရေဖိုးရေခအပြည့်အဝကောက်ခံရရှိရေး၊ ရေလေလွင့်ဆုံးရှုံးမှု လျှော့ချရေးလုပ်ငန်းများကို ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးဥပဒေနှင့်အညီ စီမံဆောင်ရွက်ခြင်း။',
                            'ရေပိုက်လိုင်းစနစ်မှ ရေပေးဝေနိုင်ခြင်းမရှိသော မြို့နယ်များတွင် မြေအောက်ရေ (အဝီစိတွင်းများ) ဖြင့် အားဖြည့်ပေးဝေနိုင်ရေး စီမံဆောင်ရွက်ခြင်း။',
                            'ခေတ်မှီနည်းစနစ်များဖြင့် လျှပ်စစ်မီးသုံးစွဲမှုသက်သာစေရန် အရည်အသွေးပြည့်မှီသော စက်ပစ္စည်းများ တပ်ဆင်အသုံးပြုခြင်းနှင့် ယာဉ်၊ ယန္တရား၊ စက်သုံးဆီများ စနစ်တကျစီမံခန့်ခွဲခြင်း။',
                            'Master Plan နှင့်အညီ နှစ်တိုနှစ်ရှည်စီမံကိန်းများ အကောင်အထည်ဖော်ရန် ဘဏ္ဍာရေးလုပ်ထုံးလုပ်နည်းနှင့်အညီ နိုင်ငံတကာချေးငွေနှင့် ထောက်ပံ့ငွေများ ရယူစီမံခန့်ခွဲခြင်း။',
                            'ရန်ကုန်မြို့တော်သူ၊ မြို့တော်သားတို့အတွက် ကျန်းမာရေးနှင့်ညီညွတ်သော သောက်သုံးရေကို နေ့စဉ် လုံလောက်စွာ ဖြန့်ဝေပေးနိုင်ရေး။',
                            'ရေဖိုးရေခများ အပြည့်အ၀ ကောက်ခံရရှိရေး။',
                            'ရေလေလွင့်ပြုန်းတီးမှုများ ကာကွယ်ထိန်းသိမ်းရေး။',
                            'မိလ္လာများ စနစ်တကျစွန့်ပစ်နိုင်ရေးအတွက် စီမံဆောင်ရွက်ရေး။',
                            'ခေတ်မီနည်းစနစ်ဖြင့် ရေပေးဝေဖြန့်ဖြူးရေးနှင့် မိလ္လာများစနစ်တကျ စွန့်ပစ်နိုင်ရေးအတွက် တိုးမြှင့်စီမံဆောင်ရွက်ရေး။',

                    ]
                },
                { 
                    id: 8, 
                    icon: 'fa-trash-can', 
                    name: 'မြို့ပြပတ်ဝန်းကျင်ထိန်းသိမ်းရေးနှင့်သန့်ရှင်းရေးဌာန',
                  
                    tasks: [
                        'လမ်းမကြီးများနှင့် လမ်းသွယ်များမှ အမှိုက်သရိုက်များကို စနစ်တကျ လှဲသိမ်း သယ်ယူ စွန့်ပစ်ခြင်းနှင့် သင့်လျော်သော အမှိုက်သိမ်းစနစ်များကို စီမံဆောင်ရွက်ခြင်း။[cite: 1]',
        'အမှိုက်ပုံရန်နေရာ သတ်မှတ်ခြင်း၊ အမှိုက်ကန်များတည်ဆောက်ခြင်းနှင့် နိုင်ငံတကာအဆင့်မီ အမှိုက်ပုံးများချထားပေးမှု စီမံဆောင်ရွက်ခြင်း။[cite: 1]',
        'အများပြည်သူသုံး အခပေးအဆင့်မြင့် သန့်စင်ခန်းများကို သန့်ရှင်းစွာ ဖွင့်လှစ်ထားရှိပေးခြင်း။[cite: 1]',
        'သုသာန်များကို စနစ်တကျဖွင့်လှစ်၍ မြေမြှပ်/ဂူသွင်းခြင်း၊ မီးသင်္ဂြိုဟ်ခြင်းလုပ်ငန်းများ စနစ်တကျစီမံခန့်ခွဲခြင်း။[cite: 1]',
        'ပတ်ဝန်းကျင်ညစ်ညမ်းမှုကာကွယ်ရန် ရေထု၊ လေထု၊ မြေထုအပေါ် ဆိုးကျိုးသက်ရောက်မှုများနှင့် အသံဆူညံခြင်းတို့အား စောင့်ကြည့်လေ့လာခြင်း၊ ကြပ်မတ်ထိန်းသိမ်းခြင်းနှင့် စစ်ဆေးအရေးယူခြင်း။[cite: 1]',
        'စည်းကမ်းမဲ့အမှိုက်စွန့်ပစ်မှုများကို အရေးယူခြင်းနှင့် စွန့်ပစ်အမှိုက်စီမံခန့်ခွဲမှုဆိုင်ရာ စည်းရုံး၊ ဟောပြော၊ ပညာပေးအစီအစဉ်များ ပြုလုပ်ခြင်း။[cite: 1]'
                    ]
                },
                { 
                    id: 9, 
                    icon: 'fa-tree', 
                    name: 'ပန်းဥယျာဉ်နှင့်အားကစားကွင်းများဌာန', 
                    
                    tasks: [
                        'မြို့တော်အတွင်းရှိ စည်ပင်သာယာပိုင်ပန်းခြံ၊ ပန်းဥယျာဉ်များနှင့် ကလေးအားကစားကွင်းများကို ပြုစုထိန်းသိမ်းမွမ်းမံခြင်းနှင့် အသစ်တိုးချဲ့တည်ဆောက်ခြင်း။[cite: 1]',
        'လမ်းဆုံအဝိုင်းကြီးများ၊ တြိဂံကျွန်းများနှင့် လမ်းလယ်ကျွန်းတို့တွင် စိမ်းလန်းစိုပြည်သော သစ်ပင်၊ မြက်ခင်းနှင့် ပန်းအလှပင်များ စိုက်ပျိုးပြုစုခြင်း။[cite: 1]',
        'အန္တရာယ်ဖြစ်စေမည့် သစ်ပင်အိုများနှင့် သစ်ကိုင်းသစ်ခက်များကို ခုတ်လှဲဖယ်ရှားပေးခြင်း။[cite: 1]',
        'မြို့တော်အတွင်း သဘာဝပတ်ဝန်းကျင်ထိန်းသိမ်းရေးအတွက် အရိပ်ရပင်များနှင့် သစ်တောပင်များကို တစ်အုပ်တစ်မ စိုက်ပျိုးထိန်းသိမ်းခြင်း။[cite: 1]',
        'ပန်းခြံဥယျာဉ်ကြီးများမှ ဝင်ငွေရရှိသော လုပ်ငန်းများကို ဖော်ထုတ်ခြင်းနှင့် ကြီးကြပ်ဆောင်ရွက်ခြင်း။[cite: 1]'
                    ]
                },
                { 
                    id: 10, 
                    icon: 'fa-shop', 
                    name: 'ဈေးများနှင့်ကုန်စည်ပွဲရုံများဌာန', 
                  
                    tasks: [
                        'ဖွင့်လှစ်ထားသော ဈေးများတွင် ဆိုင်ခန်းများ အငှားချထားခြင်း၊ ဆိုင်ခန်းတရားဝင်လွှဲပြောင်းခွင့်ပြုခြင်းနှင့် စည်းကမ်းဖောက်ဖျက်သည့်ဆိုင်များအား ပြန်လည်သိမ်းယူခြင်း။[cite: 1]',
        'ဈေးအသီးသီးအတွက် ဈေးခွန်ပြေစာများနှင့် ဈေးကောက်လက်မှတ်များ ထုတ်ပေးခြင်း၊ ဈေးခွန်ဈေးကောက်များ ပြည့်ဝစွာကောက်ခံရရှိရန် ကြီးကြပ်ခြင်း။[cite: 1]',
        'ဈေးများနှင့် ကုန်စည်ပွဲရုံစခန်းများ၏ လုံခြုံရေး၊ သန့်ရှင်းရေး၊ ရေပေးဝေရေး၊ လျှပ်စစ်မီးနှင့် အခပေးအိမ်သာများ ပြင်ဆင်ထိန်းသိမ်းခြင်းလုပ်ငန်းများကို စီမံကြီးကြပ်ခြင်း။[cite: 1]',
        'ဈေးရုံအဆောက်အအုံများရှိ ဆိုင်နေရာပုံစံများ၊ ဈေးဆိုင်စာရင်းများနှင့် ဈေးလုပ်ငန်းဆိုင်ရာ စာရင်းဇယားများကို ပြုစုထိန်းသိမ်းခြင်း။[cite: 1]',
        'အဝေးပြေးကုန်တင်ယာဉ်ရပ်နားစခန်းများ စနစ်တကျရှိစေရေးနှင့် သတ်မှတ်ထားသည့် အခွန်အကောက်များ အပြည့်အဝ ကောက်ခံရရှိရေး စီမံကြီးကြပ်ခြင်း။[cite: 1]',
        'ကော်မတီပိုင် ဆိုင်ခန်း/မြေ/လုပ်ငန်းများနှင့်ပတ်သက်၍ နှစ်စဉ်အငှားချထားပြီး သက်တမ်းမကုန်ဆုံးမီ ဆက်လက်ငှားရမ်းနိုင်ရေး ကြပ်မတ်ခြင်း။[cite: 1]'
                    ]
                },
                { 
                    id: 11, 
                    icon: 'fa-heart-pulse', 
                    name: 'ပြည်သူ့ကျန်းမာရေးဌာန',
                  
                    tasks: [
                        'သွေးလွန်တုပ်ကွေး၊ ဝမ်းပျက်ဝမ်းလျှောနှင့် ကိုဗစ်-၁၉ ကဲ့သို့သော ကူးစက်ရောဂါများ ကာကွယ်နှိမ်နင်းခြင်း (ဆေးဖျန်းခြင်း၊ Abate ဆေးခပ်ခြင်း၊ ကာကွယ်ဆေးထိုးခြင်း)။[cite: 1]',
        'စားသောက်ဆိုင်များ၊ အခြေခံပညာကျောင်းမုန့်ဈေးဆိုင်များ ကျန်းမာရေးနှင့်ညီညွတ်မှု ရှိ/မရှိ စစ်ဆေးခြင်းနှင့် ထောက်ခံချက်လက်မှတ်ထုတ်ပေးခြင်း။[cite: 1]',
        'ဈေးများအတွင်း ရောင်းချသော အစားအသောက်များတွင် ခွင့်မပြုဆိုးဆေး၊ တာရှည်ခံဖော်မလင်နှင့် ဘိုရတ် ပါ/မပါ စစ်ဆေးခြင်း၊ ရက်လွန်ဆေးဝါးများ စစ်ဆေးခြင်း။[cite: 1]',
        'ရေအဏုဇီဝနှင့် ရေဓါတုဗေဒဓာတ်ခွဲစစ်ဆေးခြင်း၊ ဟင်းသီးဟင်းရွက်များတွင် ပိုးသတ်ဆေးဓာတ်ကြွင်း စစ်ဆေးခြင်းနှင့် အစားအစာဓာတ်ခွဲစစ်ဆေးမှုများ ဆောင်ရွက်ခြင်း။[cite: 1]',
        'ကော်မတီပိုင် ဝန်ထမ်းများနှင့် မိသားစုဝင်များအတွက် ဆေးခန်းများဖွင့်လှစ်၍ ကျန်းမာရေးစောင့်ရှောက်မှု ပေးခြင်း။[cite: 1]',
        'FDA နှင့် သက်ဆိုင်ရာ ဌာနဆိုင်ရာများနှင့် ပူးပေါင်း၍ အစားအသောက်ထုတ်လုပ်သော စက်ရုံများနှင့် ပုဂ္ဂလိကဆေးရုံ၊ ဆေးခန်းများကို စစ်ဆေးခြင်း။[cite: 1]'
        ]
                },
                { 
                    id: 12, 
                    icon: 'fa-cow', 
                    name: 'တိရစ္ဆာန်ဆေးကုနှင့် ထုတ်လုပ်ရေးဌာန', 
                   
                    tasks: [
                       'ရန်ကုန်မြို့တော်၏ (၃၃) မြို့နယ်အား ကုသရေးနှင့်ကာကွယ်ရေး (ဌာနခွဲများ) ဖြင့် နယ်မြေဧရိယာအလိုက် ကြီးကြပ်စီစဉ်ဆောင်ရွက်ခြင်း။[cite: 1]',
        'ကျန်းမာရေးနှင့် ညီညွတ်ပြီး သန့်ရှင်းလတ်ဆတ်သော စားသုံးရန်သင့်သည့် အသားများ လုံလောက်စွာအချိန်မီ နေ့စဉ်ထုတ်လုပ်ဖြန့်ဖြူးရောင်းချပေးနိုင်ရေး တာဝန်ယူစီမံခန့်ခွဲခြင်း။[cite: 1]',
        'အသားထုတ်လုပ်ရုံများသို့ ရောက်ရှိလာသော တိရစ္ဆာန်အရှင်များကို ကျန်းမာရေးထောက်ခံချက်PC 3 နှင့်အညီ စစ်ဆေးခြင်း (Meat Inspection) နှင့် ပေါ်သတ်စစ်ဆေးခြင်းများ ဆောင်ရွက်ခြင်း။[cite: 1]',
        'နေ့စဉ်ထုတ်လုပ်ပြီးအသားများကို စစ်ဆေး၍ လူတို့စားသုံးရန်သင့်သော အသားခြမ်းများပေါ်တွင် ဘေးအန္တရာယ်မဖြစ်စေသော အစားအစာသုံး ဆိုးဆေးရည်ဖြင့် YCDC ခွင့်ပြုသင်္ကေတတံဆိပ်ရိုက်နှိပ်ပေးခြင်း။[cite: 1]',
        'မြို့တော်နယ်နိမိတ်အတွင်း တိရစ္ဆာန်မှ လူသို့ ကူးစက်တတ်သောရောဂါများ တားဆီး၊ ကာကွယ်၊ ထိန်းချုပ်ရေး။[cite: 1]',
        'ခေတ်မီဖွံ့ဖြူးတိုးတက်လာသော မြို့တော်အင်္ဂါရပ်နှင့်အညီ တိရစ္ဆာန်မွေးမြူရေးကဏ္ဍကို အန္တရာယ်ကင်းရှင်း၍ စည်းစနစ်ကျနပြီး ခေတ်မီဖွံ့ဖြိုးတိုးတက်စေရေး။[cite: 1]',
        'ကျန်းမာရေးနှင့်ညီညွတ်၍ သန့်ရှင်းလတ်ဆတ်မှု အာမခံချက်ပြည့်ဝသောအသားများ ထုတ်လုပ်ဖြန့်ဖြူးရေး။[cite: 1]',
        'ရန်ကုန်မြို့တော်၏ (၃၃) မြို့နယ်အား ကုသရေးနှင့်ကာကွယ်ရေး (ဌာနခွဲများ) ဖြင့် နယ်မြေဧရိယာအလိုက် ကြီးကြပ်စီစဉ်ဆောင်ရွက်ခြင်း။[cite: 1]',
        'ကျန်းမာရေးနှင့် ညီညွတ်ပြီး သန့်ရှင်းလတ်ဆတ်သော စားသုံးရန်သင့်သည့် အသားများ လုံလောက်စွာအချိန်မီ နေ့စဉ်ထုတ်လုပ်ဖြန့်ဖြူးရောင်းချပေးနိုင်ရေး တာဝန်ယူစီမံခန့်ခွဲခြင်း။[cite: 1]',
        'အသားထုတ်လုပ်ရုံများသို့ ရောက်ရှိလာသော တိရစ္ဆာန်အရှင်များကို ကျန်းမာရေးထောက်ခံချက်PC 3 နှင့်အညီ စစ်ဆေးခြင်း (Meat Inspection) နှင့် ပေါ်သတ်စစ်ဆေးခြင်းများ ဆောင်ရွက်ခြင်း။[cite: 1]',
        'နေ့စဉ်ထုတ်လုပ်ပြီးအသားများကို စစ်ဆေး၍ လူတို့စားသုံးရန်သင့်သော အသားခြမ်းများပေါ်တွင် ဘေးအန္တရာယ်မဖြစ်စေသော အစားအစာသုံး ဆိုးဆေးရည်ဖြင့် YCDC ခွင့်ပြုသင်္ကေတတံဆိပ်ရိုက်နှိပ်ပေးခြင်း။[cite: 1]'
                    ]
                },
                { 
                    id: 13, 
                    icon: 'fa-truck', 
                    name: 'ယာဉ်ယန္တရားစီမံခန့်ခွဲရေးနှင့်ထိန်းသိမ်းရေးဌာန',
                 
                    tasks: [
                        'လမ်းဖောက်ခြင်း၊ အမှိုက်သိမ်းခြင်း၊ မိလ္လာသိမ်းခြင်း၊ ရေစီးရေလာဆောင်ရွက်ခြင်း အစရှိသည့် အင်ဂျင်နီယာလုပ်ငန်းများအတွက် ယာဉ်၊ စက်၊ ယန္တရားများ အချိန်နှင့်တစ်ပြေးညီ ပံ့ပိုးပေးခြင်း။[cite: 1]',
        'ကော်မတီတစ်ရပ်လုံးရှိ ဝန်ထမ်းများအတွက် ကြို/ပို့ယာဉ်များ ပြေးဆွဲဆောင်ရွက်ပေးခြင်း။[cite: 1]',
        'ယာဉ်၊ စက်၊ ယန္တရားများအတွက် တာယာ၊ ဘက်ထရီ၊ စက်ဆီ၊ ချောဆီများအား ဈေးပြိုင်တင်ဒါစနစ်ဖြင့် ဝယ်ယူထိန်းသိမ်းခြင်းနှင့် ထုတ်ပေးခြင်း။[cite: 1]',
        'အသုံးမပြုတော့သည့် ပစ္စည်းဟောင်းများနှင့် သံတိုသံစများအား ကော်မတီဝင်ငွေရရှိရေးအတွက် ဈေးပြိုင်တင်ဒါစနစ်ဖြင့် ရောင်းချခြင်း သို့မဟုတ် သံရည်ကျိုအပ်နှံခြင်း။[cite: 1]',
        'ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးကော်မတီ နယ်နိမိတ်အတွင်းရှိ မြို့နယ်များသို့ သတ်မှတ်ဈေးနှုန်းများဖြင့် ရေပုပ်စုပ်ဝန်ဆောင်မှုလုပ်ငန်း ဆောင်ရွက်ခြင်း။[cite: 1]',
        'ကွပ်ကဲမှုအောက်ရှိ မီးသတ်ဌာစု မီးသတ်ကားများနှင့် ဝန်ထမ်းများအား အရေးပေါ်အခြေအနေတွင် အချိန်မီသွားရောက်နိုင်ရေး စနစ်တကျ စီမံထားရှိခြင်း။[cite: 1]'
                    ]
                },
                { 
                    id: 14, // သင့်လျော်ရာ ID နံပါတ် အစားထိုးနိုင်ပါသည်
    icon: 'fa-shield-halved', 
    name: 'လုံခြုံရေးနှင့်စည်းကမ်းထိန်းသိမ်းရေးဌာန', 
    
    tasks: [
        '၂၀၁၈ ခုနှစ် ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးဥပဒေ အရ လုံခြုံရေးနှင့် စည်းကမ်းထိန်းသိမ်းရေးလုပ်ငန်းများ စီမံချက်ချမှတ် ဆောင်ရွက်ခြင်း။',
        'မြန်မာနိုင်ငံရဲတပ်ဖွဲ့ဝင်များနှင့် ပူးပေါင်း၍ စည်ပင်သာယာရဲတပ်ဖွဲ့ဖြင့် မြို့တော်လုံခြုံရေး လုပ်ငန်းရပ်များကို ညှိနှိုင်းဆောင်ရွက်ခြင်း။',
        'မိမိပိုင်ရေလှောင်ကန်များ (လှော်ကား၊ ဖူးကြီး၊ ဂျိုးဖြူ၊ ငမိုးရိပ်) ၏ လုံခြုံရေးနှင့် ရေညစ်ညမ်းမှု မဖြစ်စေရေးအတွက် တားမြစ်ခြင်း၊ ထိန်းသိမ်းခြင်းနှင့် အရေးယူခြင်း။',
        'လမ်းဘေးဈေးသည်များအား သတ်မှတ်ထုတ်ပြန်သည့် စည်းကမ်းချက်များနှင့်အညီ စနစ်တကျ ရောင်းချစေရန် ကြပ်မတ်ဆောင်ရွက်ခြင်း။',
        'မြို့တော်နယ်နိမိတ်အတွင်း ယာဉ်ရပ်နားခြင်း၊ ယာဉ်စည်းကမ်းထိန်းသိမ်းခြင်း၊ လူကူးမျဉ်းကျား၊ ခုံးကျော်တံတားနှင့် မြေအောက်လမ်းများမှ စည်းကမ်းတကျ ဖြတ်ကူးစေရန် အမိန့်နှင့် ညွှန်ကြားချက်များ ထုတ်ပြန်ဆောင်ရွက်ခြင်း။',
        'အစိုးရအဖွဲ့မှ အခါအားလျော်စွာ တာဝန်ပေးအပ်သည့် မြို့တော်လုံခြုံရေးဆိုင်ရာ ကိစ္စရပ်များကို သက်ဆိုင်ရာဌာန အဖွဲ့အစည်းများနှင့် ပူးပေါင်းဆောင်ရွက်ခြင်း။',
                    ]
                },
                { 
                    id: 15, // သင့်လျော်ရာ ID နံပါတ် အစားထိုးနိုင်ပါသည်
    icon: 'fa-faucet-drip', 
    name: 'အင်ဂျင်နီယာဌာန(ရေစီးရေလာစီမံခန့်ခွဲမှု)', 
    
    tasks: [
        'ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးကော်မတီပိုင်နယ်နိမိတ်အတွင်း ရေကြီးရေလျှံမှု လျော့နည်းစေရန်နှင့် ချောင်းကြီး၊ မြောင်းကြီးများ မြေအောက်ရေမြောင်းများနှင့် မြစ်ထွက်ပေါက်များမှ ရေစီးရေလာတိုးတက်ကောင်းမွန်စေရန် စဉ်ဆက်မပြတ်ထိန်းသိမ်းဆောင်ရွက်ခြင်း။',
        'ကော်မတီနှင့်ဌာနမှပေးအပ်သော ရေစီးရေလာလုပ်ငန်းတာဝန်များအား အောင်မြင်ပြီးမြောက်စေရန် ကွပ်ကဲဆောင်ရွက်ခြင်း။',
        'ရေစီးရေလာလုပ်ငန်းများနှင့်ပတ်သက်၍ လိုအပ်သောလုပ်ငန်းစီမံကိန်းများ ရေးဆွဲခြင်း၊ ဒီဇိုင်းပုံထုတ်ခြင်း၊ ခန့်မှန်းတန်ဖိုးများ စိစစ်အတည်ပြုခြင်းနှင့် တည်ဆောက်ရေးလုပ်ငန်းများအား အကောင်အထည်ဖော်ကြီးကြပ်ကွပ်ကဲခြင်း။',
        'နိုင်ငံတကာမိတ်ဖက်အဖွဲ့အစည်းများ၊ ကော်မတီအောက်ရှိအခြားသောဌာနများ၊ အခြားဝန်ကြီးဌာနများ၊ ပုဂ္ဂလိကကုမ္ပဏီများနှင့် ပူးပေါင်းဆောင်ရွက်ရာတွင် ဦးစီးတာဝန်ယူ၍ ပေါင်းစပ်ညှိနှိုင်းဆောင်ရွက်ခြင်း။',
        'ရေစီးရေလာလုပ်ငန်းများအတွက် ကော်မတီမှ လျာထားသတ်မှတ်သော အခွန်အခများ ပြည့်မီစွာ ရရှိရေးအတွက် ကြီးကြပ်ကွပ်ကဲခြင်း။',
        'ရေစီးရေလာလုပ်ငန်းများဆောင်ရွက်ရာတွင် ကော်မတီမှအတည်ပြုထားသော ရန်ပုံငွေအား ထိရောက်စွာ အသုံးပြုနိုင်ရန် ကြီးကြပ်ကွပ်ကဲခြင်း။',
        'ကော်မတီနယ်နိမိတ်အတွင်းရှိ ချောင်းကြီး၊ မြောင်းကြီးများအား နယ်နိမိတ်သတ်မှတ်ဆောင်ရွက်ခြင်းနှင့် တည်ဆောက်ပြီး ရေစီးရေလာအဆောက်အအုံများ၊ ရေထိန်းတံခါးများအား ပြုပြင်ထိန်းသိမ်းခြင်း။',
        'ရေစီးရေလာလုပ်ငန်းများတွင် အသုံးပြုရသော ကော်မတီပိုင်စက်ယန္တရားများနှင့် ပစ္စည်းများအား ပြုပြင်ထိန်းသိမ်းဆောင်ရွက်ခြင်းနှင့် စီမံခန့်ခွဲခြင်း။',
        'ဌာနရှိ အရာထမ်း၊ အမှုထမ်းများအား လုပ်ငန်းတာဝန်များ စနစ်တကျခွဲဝေတာဝန်ပေးအပ်ခြင်းနှင့် ဝန်ထမ်းသက်သာချောင်ချိရေးကို ဂရုပြုဆောင်ရွက်ပေးခြင်း။',
        'ကော်မတီနှင့် ဌာနမှ သီးခြားပေးအပ်သော တာဝန်များထမ်းဆောင်ခြင်း။',
        'ရန်ကုန်မြို့တော်အတွင်း ရေစီးရေလာကောင်းမွန်စေရေးနှင့် ရေကြီးရေလျှံမှုဖြစ်ပေါ်ခဲ့သော နေရာများအား ထပ်မံမဖြစ်ပွားစေရေး။',
        'ရေကြီးရေလျှံမှုဖြစ်ပေါ်သောနေရာများ တဖြည်းဖြည်းလျော့နည်းပပျောက်စေရေး။',
        'ရေကြီးရေလျှံမှုဖြစ်ပေါ်သောနေရာများတွင် နည်းလမ်းမျိုးစုံဖြင့်ဆောင်ရွက်ပြီး မြစ်ထွက်ပေါက်များ၊ ချောင်းကြီး၊ မြောင်းကြီးများ၊ ရေတံခါးများ ရေစီးဆင်းမှုကောင်းမွန်စေရန် လုပ်ဆောင်ပြီး မြို့တော်နေပြည်သူများ ရေကြီးဒုက္ခမှကင်းဝေးကာ စိတ်ချမ်းမြေ့သာယာမှုပေးစွမ်းနိုင်ရေး။'
                    ]
                },
                { 
                    id: 16, // သင့်လျော်ရာ ID နံပါတ် အစားထိုးနိုင်ပါသည်
    icon: 'fa-city', 
    name: 'မြို့ပြစီမံကိန်းဌာန', 
    code: 'DEPT-11',
    organization: {
        officers: 24,  // အရာထမ်း
        staffs: 256,   // အမှုထမ်း
        total: 280     // စုစုပေါင်းဝန်ထမ်းအင်အား
    },
    tasks: [
        'မြို့ပြဖွံ့ဖြိုးရေးစီမံကိန်းများဆောင်ရွက်ရန် ပြည်တွင်းပြည်ပ အဖွဲ့အစည်းများ၊ ကုမ္ပဏီများမှ အဆိုပြုတင်ပြလာသည့် စီမံကိန်းလုပ်ငန်းများကို စိစစ်ခြင်းနှင့် ခွင့်ပြုခြင်း။',
        'မြို့ပြစီမံကိန်းဆိုင်ရာ လုပ်ထုံးလုပ်နည်းများ ရေးဆွဲခြင်း။',
        'မြို့ပြမြေအသုံးချမှုများ (Urban Land Use) သတ်မှတ်ရေးဆွဲခြင်း။',
        'မြို့ပြမြေအသုံးချမှု ပြောင်းလဲမှု (Change of Land Use) အပေါ် စိစစ်ခွင့်ပြုခြင်း။',
        'မြို့တော်၏ စီးပွားရေးနှင့် လူမှုရေးပြောင်းလဲမှုများနှင့်အညီ လိုအပ်ပါက မြို့ပြအခြေခံအဆောက်အအုံများ ပါဝင်သည့် Master Plan ရေးဆွဲခြင်း။',
        'မြို့တော်နေပြည်သူများ၏ အိမ်ရာလိုအပ်ချက်များကို သိရှိနိုင်စေရန် လူမှုရေးစစ်တမ်း၊ အိမ်ရာစစ်တမ်းများ ကောက်ယူ၍ စာရင်းဇယားများ ပြုစုခြင်းနှင့် ဖြည့်ဆည်းပေးခြင်း။',
        'တည်ဆောက်ပြီး မြို့သစ်၊ ရပ်ကွက်သစ်များ ဖွံ့ဖြိုးမှုလုပ်ငန်းများ ဆောင်ရွက်ရန်အတွက် အခါအားလျော်စွာ အဆိုပြုတင်ပြခြင်း။',
        'မြို့နေပြည်သူများ၏ သယ်ယူပို့ဆောင်ရေးစနစ် ပိုမိုကောင်းမွန်ရေးအတွက် သက်ဆိုင်ရာဌာနများနှင့် ပူးပေါင်းချိတ်ဆက်၍ အချက်အလက်များရယူပြီး လေ့လာဆန်းစစ်တင်ပြခြင်း။',
        'ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးကော်မတီနယ်နိမိတ်အတွင်း ဖွံ့ဖြိုးရေးစီမံကိန်းများနှင့် အိမ်ရာစီမံကိန်းများ ရေးဆွဲတင်ပြခြင်း။',
        'မြို့ပြအမွေအနှစ် အဆောက်အအုံများ (Urban Heritage Buildings) ရေရှည်တည်တံ့စေရေး ထိန်းသိမ်းစောင့်ရှောက်မည့် အစီအစဉ်များကို ရေးဆွဲတင်ပြခြင်း။',
        'မြို့တော်တိုးတက်ဖွံ့ဖြိုးစေရန်အလို့ငှာ ပြည်တွင်း၊ ပြည်ပအဖွဲ့အစည်းများ၊ ပညာရှင်များနှင့် ပူးပေါင်းချိတ်ဆက်ဆောင်ရွက်ခြင်း။',
        'လုပ်ငန်းတာဝန်များကို ဆောင်ရွက်ရာတွင် ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးဥပဒေ၊ နည်းဥပဒေနှင့် ညွှန်ကြားချက်များနှင့်အညီ လိုက်နာဆောင်ရွက်ခြင်း။'
                    ]
                },
                { 
                    id: 17, // သင့်လျော်ရာ ID နံပါတ် အစားထိုးနိုင်ပါသည်
    icon: 'fa-bullhorn', 
    name: 'ပြည်သူ့ဆက်ဆံရေးနှင့်ပြန်ကြားရေးဌာန', 
    code: 'DEPT-12',
    tasks: [
        'ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးကော်မတီ၏ ဦးတည်ချက်များ၊ စည်ပင်သာယာဆိုင်ရာ ပညာပေးနှိုးဆော်ချက်များ၊ အမိန့်ကြေညာချက်များနှင့် လိုက်နာရမည့် ပြည်သူ့နီတိများကို သတင်းမီဒီယာနည်းလမ်းများဖြင့် အသိပညာပေးခြင်းနှင့် စည်းရုံးလှုံ့ဆော်ခြင်း။',
        'မြို့တော်သူ မြို့တော်သားတို့၏ သာယာပျော်ရွှင်မှုရှိစေရန် ပန်းဥယျာဉ်၊ ပန်းခြံများအတွင်း အငြိမ့်၊ ဇာတ်သဘင်၊ အက၊ ဂီတများဖြင့် ဖျော်ဖြေပွဲများကို အစိုးရဌာန၊ အဖွဲ့အစည်းများ၊ ပြင်ပအဖွဲ့အစည်းများနှင့် ပေါင်းစပ်ညှိနှိုင်းဆောင်ရွက်ပေးခြင်း။',
        'နိုင်ငံတော်မှကျင်းပသော အခမ်းအနားများနှင့် ကော်မတီကတာဝန်ယူကျင်းပသော အခမ်းအနားများ၌ အများပြည်သူတို့အတွက် ဖျော်ဖြေပွဲများ၊ ပျော်ပွဲရွှင်ပွဲများ ဆောင်ရွက်ရာတွင် သက်ဆိုင်ရာဌာနများနှင့် ပေါင်းစပ်ညှိနှိုင်း၍ တတာဝန်ယူဆောင်ရွက်ခြင်း။',
        'ကော်မတီလက်အောက်ရှိ လုပ်ငန်းတာဝန်ခံအဖွဲ့များ၊ ဌာနများနှင့် မြို့နယ်စည်ပင်သာယာရေးကော်မတီများမှ စည်ပင်သာယာဆိုင်ရာ လုပ်ငန်းရပ်များ ဆောင်ရွက်နေမှုကို အများပြည်သူများ သိရှိနားလည်စေရန် သတင်းမီဒီယာမှတစ်ဆင့် အသိပေးတင်ပြခြင်းနှင့် ဖြန့်ချိခြင်းလုပ်ငန်းများကို စီမံဆောင်ရွက်ခြင်း။',
        'မြို့တော်နယ်နိမိတ်အတွင်း စီမံကိန်းလုပ်ငန်းကြီးများ အကောင်အထည်ဖော် ဆောင်ရွက်နေမှုများကို သတင်းမီဒီယာများမှတစ်ဆင့် သတင်းထုတ်ပြန်နိုင်ရေး စီစဉ်ဆောင်ရွက်ခြင်း၊ ဓာတ်ပုံ၊ ဗီဒီယို၊ မှတ်တမ်းများ ရိုက်ကူးရယူ၍ ခေတ်မီနည်းစနစ်များနှင့်အညီ ထိန်းသိမ်းထားရှိခြင်း။',
        'ကော်မတီလက်အောက်ရှိ လုပ်ငန်းတာဝန်ခံအဖွဲ့များ၊ ဌာနများ၏ ပုံနှိပ်ခြင်းဆိုင်ရာကိစ္စရပ်များ ဆောင်ရွက်နိုင်ရန် ကော်မတီပိုင် ပုံနှိပ်စက်များ တည်ထောင်ခြင်းနှင့် ထပ်မံတိုးချဲ့ခြင်းများကို စီမံဆောင်ရွက်ခြင်း။',
        'မြို့တော်စည်ပင်သာယာရေးလုပ်ငန်း ဆောင်ရွက်နေမှုများ၊ လုံခြုံရေးကိစ္စရပ်များ၊ ယာဉ်စည်းကမ်း လမ်းစည်းကမ်းဆိုင်ရာ ကိစ္စရပ်များအား ပြည်သူများအချိန်နှင့်တစ်ပြေးညီ သိရှိလိုက်နာဆောင်ရွက်နိုင်စေရန် ရေဒီယိုနှင့် ရုပ်မြင်သံကြားလိုင်းများ တည်ထောင်၍ နှိုးဆော်ခြင်း၊ ဖျော်ဖြေတင်ဆက်ခြင်းနှင့် သတင်းထုတ်လွှင့်ခြင်းလုပ်ငန်းများကို ကြီးကြပ်ဆောင်ရွက်ခြင်း။',
        'မြို့တော်စည်ပင်သာယာရေးလုပ်ငန်းများနှင့် သက်ဆိုင်သည့် သတင်းအချက်အလက်များကို စုစည်းပြုစု၍ ခေတ်မီသတင်းအချက်နည်းပညာများကို အသုံးပြု၍ ဝန်ဆောင်မှုများ ဆောင်ရွက်ပေးခြင်း၊ ကော်မတီဝင်များမှ မြို့နယ်စည်ပင်အဆင့်ထိ သတင်းကွန်ရက်စနစ် ချိတ်ဆက်နိုင်အောင် စီမံဆောင်ရွက်ခြင်း။',
        'သတင်းမီဒီယာလုပ်ငန်း၊ ရုပ်သံဝန်ဆောင်မှုလုပ်ငန်းများ ဆောင်ရွက်ရာတွင် လုပ်ငန်းတစ်ခုလုံးကိုဖြစ်စေ၊ လုပ်ငန်းတစ်စိတ်တစ်ပိုင်းကိုဖြစ်စေ ပြည်တွင်းပြည်ပအဖွဲ့အစည်း ကုမ္ပဏီများ၊ လူပုဂ္ဂိုလ်များနှင့် ပူးပေါင်းဆောင်ရွက်ခြင်း၊ လုပ်ငန်းအပ်နှံဆောင်ရွက်ခြင်းနှင့် ဖက်စပ်လုပ်ကိုင်ခြင်းများကို ညှိနှိုင်းဆောင်ရွက်ခြင်း။',
        'သတင်းမီဒီယာလုပ်ငန်း၊ ရုပ်သံဝန်ဆောင်မှုလုပ်ငန်းများနှင့် စပ်လျဉ်း၍ အစိုးရရုံး၊ ဌာနဆိုင်ရာအဖွဲ့အစည်းများ၊ ပြင်ပအဖွဲ့အစည်းများ၊ သတင်းအေဂျင်စီများနှင့် သတင်းအချက်အလက်များ ဖလှယ်ခြင်း၊ ရယူခြင်းနှင့် လိုအပ်ပါက အခကြေးငွေဖြင့် ဝယ်ယူခြင်းလုပ်ငန်းများကို ညှိနှိုင်းပူးပေါင်းဆောင်ရွက်ခြင်း။',
        'သတင်းမီဒီယာထုတ်လွှင့်မှုများ၊ ဖြန့်ချိမှုများနှင့်စပ်လျဉ်း၍ ပြည်တွင်းပြည်ပနှင့် အပြန်အလှန် ဆက်သွယ်ရယူဆောင်ရွက်ရာတွင် ပြည်တွင်းပြည်ပမှ သတင်းနှင့် ဆက်သွယ်ရေးဆိုင်ရာ နည်းပညာနှင့် ပစ္စည်းကိရိယာများကို အကူအညီရယူခြင်းနှင့် အထောက်အပံ့ရယူခြင်း။'
                    ]
                },
                { 
                    id: 18, 
                    icon: 'fa-layer-group', 
                    name: 'မြို့ပြစီမံကိန်းဌာန', 
                    code: 'DEPT-18',
                    tasks: [
                       'မြို့ပြဖွံ့ဖြိုးရေးစီမံကိန်းများ ဆောင်ရွက်ရန် ပြည်တွင်းပြည်ပ အဖွဲ့အစည်းများ၊ ကုမ္ပဏီများမှ အဆိုပြုတင်ပြလာသည့် စီမံကိန်းလုပ်ငန်းများကို စိစစ်ခြင်း၊ ခွင့်ပြုခြင်း။[cite: 1]',
        'မြို့ပြမြေအသုံးချမှုများ သတ်မှတ်ရေးဆွဲခြင်းနှင့် မြေအသုံးချမှု ပြောင်းလဲမှုအပေါ် စိစစ်ခွင့်ပြုခြင်း။[cite: 1]',
        'စီးပွားရေးနှင့် လူမှုရေးပြောင်းလဲမှုများနှင့်အညီ လိုအပ်ပါက မြို့ပြအခြေခံအဆောက်အအုံများ ပါဝင်သည့် Master Plan ရေးဆွဲခြင်း။[cite: 1]',
        'မြို့တော်နေပြည်သူများ၏ အိမ်ရာလိုအပ်ချက်အတွက် လူမှုရေးစစ်တမ်း၊ အိမ်ရာစစ်တမ်းများ ကောက်ယူပြုစုခြင်း။[cite: 1]',
        'မြို့နေပြည်သူများ၏ သယ်ယူပို့ဆောင်ရေးစနစ် ပိုမိုကောင်းမွန်ရေးအတွက် သက်ဆိုင်ရာဌာနများနှင့် ပူးပေါင်းချိတ်ဆက် လေ့လာဆန်းစစ်တင်ပြခြင်း။[cite: 1]',
        'မြို့ပြအမွေအနှစ် အဆောက်အအုံများ ရေရှည်တည်တံ့စေရေး ထိန်းသိမ်းစောင့်ရှောက်မည့် အစီအစဉ်များကို ရေးဆွဲတင်ပြခြင်း။[cite: 1]'
    ]
                }
            ]
         }">
         
        <!-- နောက်ခံ အလှဆင်အဝိုင်း -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-emerald-100/40 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- ခေါင်းစဉ်အပိုင်း -->
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-slate-900">စည်ပင်သာယာရေးကော်မတီ ဌာန</h2>
               <div x-show="openTasks === null" class="w-full border-2 border-dashed border-slate-200 rounded-3xl p-12 text-center text-slate-400 font-medium">
                    <i class="fa-solid fa-folder-open text-4xl mb-3 text-slate-300"></i>
                    <p class="text-sm">ဌာနတစ်ခုခု၏ ကတ်ပြား သို့မဟုတ် "👁 ကြည့်ရန်" ကိုနှိပ်၍ အသေးစိတ် လုပ်ငန်းတာဝန်များကို ဖတ်ရှုနိုင်ပါသည်။</p>
                </div>
                <div class="w-10 h-1 bg-emerald-400 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- ဌာနကတ်ပြားများ (Horizontal Scroll ပြုလုပ်နိုင်သော နေရာ) -->
            <div class="w-full flex gap-4 overflow-x-auto pb-6 pt-2 px-2 scrollbar-thin scrollbar-thumb-emerald-200 snap-x">
                <template x-for="dept in departments" :key="dept.id">
                    <button @click="activeDept = dept.id; if(openTasks === dept.id) { openTasks = null } else { openTasks = dept.id }" 
                            :class="activeDept === dept.id ? 'bg-gradient-to-br from-emerald-50 to-emerald-100/40 border-emerald-400 shadow-md ring-2 ring-emerald-400/20' : 'bg-white/90 border-slate-200/70 hover:bg-emerald-50/30 hover:border-emerald-200'"
                            class="snap-center min-w-[190px] md:min-w-[220px] flex-shrink-0 border p-6 rounded-2xl transition-all duration-300 text-center flex flex-col items-center justify-center group outline-none">
                        
                        <div :class="activeDept === dept.id ? 'bg-emerald-600 text-white shadow-md shadow-emerald-600/20 scale-110' : 'bg-emerald-50/60 text-emerald-700 group-hover:bg-emerald-100 group-hover:text-emerald-800'"
                             class="w-14 h-14 rounded-2xl flex items-center justify-center text-xl transition-all duration-300 border border-emerald-100/50 mb-4">
                            <i :class="'fa-solid ' + dept.icon"></i>
                        </div>

                        <span :class="activeDept === dept.id ? 'text-emerald-950 font-bold' : 'text-slate-700 font-medium'"
                              class="text-xs md:text-sm leading-snug line-clamp-2 select-none mb-2" x-text="dept.name">
                        </span>

                        <!-- ဖတ်ရန်/ပိတ်ရန် အချက်ပြစာသား -->
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md"
                              :class="openTasks === dept.id ? 'bg-red-50 text-red-600 border border-red-100' : 'bg-slate-100 text-slate-500'">
                            <span x-text="openTasks === dept.id ? '✖ ပိတ်ရန်' : '👁 ကြည့်ရန်'"></span>
                        </span>
                    </button>
                </template>
            </div>

            <!-- အသေးစိတ်အချက်အလက်ပြသသည့်နေရာ (Toggle View) -->
            <div class="mt-8 relative min-h-[200px]">
                <template x-for="dept in departments" :key="dept.id">
                    <div x-show="activeDept === dept.id && openTasks === dept.id"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150 transform absolute inset-0"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-4"
                         class="w-full bg-white/90 backdrop-blur-xl border border-emerald-100/50 rounded-3xl p-6 md:p-10 shadow-sm flex flex-col gap-8">
                        
                        <!-- ဌာနခေါင်းစဉ်အသေးစိတ် နှင့် ပိတ်ရန်ခလုတ်ကြီး -->
                        <div class="w-full flex items-center justify-between border-b border-slate-100 pb-4 flex-wrap gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 text-white rounded-2xl flex items-center justify-center text-xl shadow-md">
                                    <i :class="'fa-solid ' + dept.icon"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl md:text-2xl font-black text-slate-900" x-text="dept.name"></h3>
                                    <p class="text-xs font-mono font-bold text-emerald-600 uppercase mt-0.5" x-text="dept.code"></p>
                                </div>
                            </div>
                            
                            <!-- စာတ်ဖတ်ပြီးပြန်ပိတ်ရန် တိုက်ရိုက်အမဲရောင်ခလုတ် -->
                            <button @click="openTasks = null" class="text-xs font-bold text-white bg-slate-900 hover:bg-red-600 px-4 py-2 rounded-xl transition-colors duration-200 flex items-center gap-2 shadow-sm">
                                <span>✖ ယခုကဏ္ဍကို ပြန်ပိတ်မည်</span>
                            </button>
                        </div>

                        <!-- 📋 ဌာန၏ ပင်မလုပ်ငန်းတာဝန်များ စာရင်း -->
                        <div>
                            <h4 class="text-sm font-bold uppercase tracking-wider text-slate-800 bg-slate-100 px-4 py-2 rounded-lg inline-block mb-4">📋 ဌာန၏ ပင်မလုပ်ငန်းတာဝန်များ</h4>
                            <ul class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                                <template x-for="(task, index) in dept.tasks" :key="index">
                                    <li class="flex items-start gap-3 bg-slate-50/50 p-3.5 rounded-xl border border-slate-100">
                                        <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-bold flex items-center justify-center shrink-0 mt-0.5" x-text="index+1"></div>
                                        <p class="text-xs md:text-sm text-slate-600 leading-relaxed text-justify" x-text="task"></p>
                                    </li>
                                </template>
                            </ul>
                        </div>

                    </div>
                </template>

                <!-- မည်သည့်အချက်အလက်မှ မဖွင့်ထားချိန်တွင် ပြသမည့် Placeholder -->
               
            </div>

        </div>
</section>


   
  
<div class="max-w-5xl mx-auto px-4 py-12 font-sans">
  
  <div class="text-center mb-10">
    <h2 id="faq-title" class="text-2xl md:text-3xl font-bold text-slate-800">
      အမေးအများဆုံး မေးခွန်းများနှင့် အဖြေများ
    </h2>
  </div>

  <div id="dept-list-view" class="bg-white rounded-lg shadow-md border border-slate-100 overflow-hidden">
    <div class="divide-y divide-slate-100" id="departments-container">
      </div>
  </div>

  <div id="questions-view" class="hidden">
    <button onclick="showDepartmentList()" class="inline-flex items-center text-sm text-slate-600 hover:text-emerald-600 font-medium mb-6 transition-colors">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
      <span id="back-btn-text">ဌာနများစာရင်းသို့</span>
    </button>

    <div class="bg-emerald-800 text-white text-center py-4 px-6 rounded-t-lg font-semibold text-lg md:text-xl shadow-sm">
      <h3 id="selected-dept-title">-</h3>
    </div>

    <div class="bg-white rounded-b-lg shadow-md border-x border-b border-slate-100 p-4 md:p-6 space-y-4" id="accordion-container">
      </div>
  </div>
</div>

<script>
// --- ဘာသာစကား နှင့် ဌာနအလိုက် Data Setup (ဌာန ၁၂ ခုစလုံးအတွက် မေးခွန်း ၁၀ ခုစီ) ---
const faqData = {
  mm: {
    title: "အမေးအများဆုံး မေးခွန်းများနှင့် အဖြေများ",
    backBtn: "ဌာနများစာရင်းသို့",
    viewBtn: "ကြည့်ရှုရန်",
    departments: [
      {
        id: "eng-road",
        name: "အင်ဂျင်နီယာဌာန (လမ်းနှင့်တံတား)",
        questions: [
          { q: "မိမိတို့ရပ်ကွက်အတွင်း လမ်းများချိုင့်ခွက်ဖြစ်ပြီး ပျက်စီးနေခြင်းကို မည်သို့ တိုင်ကြားရမည်နည်း။", a: "ဤ Complaint System တွင် Sign In ဝင်ရောက်ပြီး 'တိုင်ကြားရန်' စာမျက်နှာမှတစ်ဆင့် လမ်းအမည်၊ လမ်းညွှန်အမှတ်အသားနှင့် ဓာတ်ပုံမှတ်တမ်းများနှင့်တကွ တင်ပြတိုင်ကြားနိုင်ပါသည်။" },
          { q: "လမ်းနယ်နိမိတ်အတွင်း ခွင့်ပြုချက်မရှိဘဲ ကျူးကျော်ဆောက်လုပ်ခြင်းကို မည်သို့ တိုင်ကြားနိုင်ပါသလဲ။", a: "ခွင့်ပြုချက်မရှိဘဲ လမ်းပေါ်ကျူးကျော်ခြင်းများအတွက် တတည်နေရာအတိအကျနှင့်တကွ 'လမ်းနှင့်တံတားဌာန' ကို ရွေးချယ်၍ တိုင်ကြားစာ ပေးပို့နိုင်ပါသည်။" },
          { q: "လမ်းမီးပွိုင့်များ သို့မဟုတ် လမ်းညွှန်ဆိုင်းဘုတ်များ ပျက်စီးနေပါက မည်သည့်ဌာနသို့ အကြောင်းကြားရမည်နည်း။", a: "အင်ဂျင်နီယာဌာန (လမ်းနှင့်တံတား) သို့ တိုက်ရိုက်အကြောင်းကြား တိုင်ကြားနိုင်ပါသည်။" },
          { q: "ရပ်ကွက်တွင်း လမ်းခင်းရန်အတွက် ကတ္တရာ သို့မဟုတ် ကွန်ကရစ်လမ်း လျှောက်ထားမှုကို မည်သို့ စုံစမ်းနိုင်သနည်း။", a: "သက်ဆိုင်ရာ မြို့နယ်စည်ပင်သာယာရေးအုပ်ချုပ်မှုရုံး သို့မဟုတ် ဤစနစ်၏ စုံစမ်းမေးမြန်းမှု ကဏ္ဍမှတစ်ဆင့် စာရင်းအခြေအနေကို စုံစမ်းနိုင်ပါသည်။" },
          { q: "အများသုံးလမ်းပေါ်တွင် အဆောက်အအုံဆောက်လုပ်ရေးပစ္စည်းများ ရေရှည်ပုံထားခြင်းကို မည်သို့ တိုင်ကြားရမည်နည်း။", a: "လမ်းပိတ်ဆို့မှုဖြစ်စေသော ပစ္စည်းပုံခြင်းများကို လမ်းနှင့်တံတားဌာနသို့ ဓာတ်ပုံနှင့်တကွ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "တံတားများ ကြံ့ခိုင်မှုအားနည်းခြင်း သို့မဟုတ် အက်ကွဲကြောင်းထင်နေခြင်းကို မည်သို့ သတင်းပို့ရမည်နည်း။", a: "အများပြည်သူ ဘေးအန္တရာယ်ကင်းရှင်းရေးအတွက် တံတားအမည်နှင့် တည်နေရာကို အရေးပေါ်တိုင်ကြားချက်အဖြစ် ပေးပို့နိုင်ပါသည်။" },
          { q: "မိမိတို့ရပ်ကွက်အတွင်း ညဘက် လမ်းမီးများမလင်းခြင်း သို့မဟုတ် မီးတိုင်များ ပျက်စီးနေခြင်းကို မည်သို့ အကြောင်းကြားရမည်နည်း။", a: "လမ်းမီးတိုင်အမှတ် သို့မဟုတ် လမ်းအမည်ကို ဖော်ပြ၍ လမ်းမီးပြုပြင်ရေးကဏ္ဍသို့ လျှောက်ထားတိုင်ကြားနိုင်ပါသည်။" },
          { q: "အများသုံးလမ်းပေါ်တွင် ယာဉ်အိုယာဉ်ပျက်များ ရေရှည်စွန့်ပစ်ထားခြင်းကို မည်သို့ ဖယ်ရှားပေးမည်နည်း။", a: "သက်ဆိုင်ရာ လမ်းနှင့်တံတားဌာနမှ စစ်ဆေးပြီး သတ်မှတ်ဥပဒေအတိုင်း ဖယ်ရှားရှင်းလင်းပေးသွားမည် ဖြစ်ပါသည်။" },
          { q: "ကွန်ကရစ်လမ်းခင်းပြီးနောက် သတ်မှတ်ရက်မပြည့်မီ ကားများဖြတ်သန်းမောင်းနှင်မှုကို မည်သို့ တိုင်ကြားရမည်နည်း။", a: "လမ်းအရည်အသွေး ထိခိုက်နိုင်သဖြင့် ချက်ချင်းသက်ဆိုင်ရာ ရုံးသို့ဖြစ်စေ၊ ဤစနစ်မှဖြစ်စေ အရေးပေါ်အကြောင်းကြားနိုင်ပါသည်။" },
          { q: "လမ်းနယ်နိမိတ် သို့မဟုတ် လူသွားပလပ်ဖောင်းပေါ်တွင် ဆိုင်ခန်းများ ကျူးကျော်ဆောက်လုပ်ခြင်းကို မည်သို့ တိုင်ကြားရမည်နည်း။", a: "လူသွားလူလာ နှောင့်နှေးမှုဖြစ်စေသော ကျူးကျော်ဆိုင်ခန်းများကို ဓာတ်ပုံနှင့်တကွ စနစ်ထဲတွင် တိုင်ကြားစာပေးပို့နိုင်ပါသည်။" }
        ]
      },
      {
        id: "eng-building",
        name: "အင်ဂျင်နီယာဌာန (အဆောက်အအုံ)",
        questions: [
          { q: "ခွင့်ပြုချက်မရှိဘဲ အဆောက်အအုံဆောက်လုပ်နေခြင်းကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "အဆောက်အအုံတည်နေရာနှင့် ကျူးကျော်ဆောက်လုပ်မှုပုံစံကို ဓာတ်ပုံရိုက်၍ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "ဘေးနားကအိမ် ဆောက်လုပ်ရာတွင် မိမိအိမ်ဘက်သို့ မြေပြိုကျခြင်း၊ အက်ကွဲခြင်းဖြစ်လျှင် မည်သို့လုပ်ရမည်နည်း။", a: "အဆောက်အအုံဌာနသို့ အရေးပေါ်အကြောင်းကြားစာအဖြစ် ပျက်စီးဆုံးရှုံးမှုပုံများနှင့်တကွ ပေးပို့တိုင်ကြားရပါမည်။" },
          { q: "အဆောက်အအုံဆောက်လုပ်ခွင့်လိုင်စင် ကျဆင်းမှုကို ဘယ်လိုစစ်ဆေးရမလဲ။", a: "မိမိလျှောက်ထားထားသော ဖိုင်အမှတ်စဉ်ကို အသုံးပြု၍ သက်ဆိုင်ရာဌာနတွင် စုံစမ်းနိုင်ပါသည်။" },
          { q: "ဟောင်းနွမ်းဆိုးရွားပြီး ပြိုကျလုနီးပါးဖြစ်နေသော အဆောက်အအုံများကို ဘယ်လိုအကြောင်းကြားရမလဲ။", a: "အများပြည်သူအန္တရာယ်ကင်းရှင်းရေးအတွက် တည်နေရာကို သတ်မှတ်ပြီး အဆောက်အအုံဌာနသို့ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အထပ်မြင့်အဆောက်အအုံများ စည်းကမ်းမဲ့ ငြမ်းဆင်ဆောက်လုပ်နေခြင်းကို တိုင်ကြားချင်ပါသည်။", a: "ငြမ်းဆင်မှုစံချိန်စံညွှန်းမမှီခြင်းနှင့် အန္တရာယ်ရှိသော လုပ်ငန်းခွင်များကို ဤစနစ်မှတစ်ဆင့် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အိမ်ခြံမြေစည်းရိုး ကျူးကျော်ခတ်ခြင်းကို မည်သို့ဖြေရှင်းရမည်နည်း။", a: "မြေတိုင်းမြေပုံနှင့်တကွ မြေယာဌာနနှင့် အဆောက်အအုံဌာနသို့ ပူးတွဲတိုင်ကြားရပါမည်။" },
          { q: "အဆောက်အအုံ ဆောက်လုပ်ခွင့်သက်တမ်းတိုးရန် မည်သည့်စာရွက်စာတမ်းများ လိုအပ်ပါသလဲ။", a: "မူလခွင့်ပြုမိန့်စာအုပ်၊ မြေပိုင်ဆိုင်မှုအထောက်အထားနှင့် လျှောက်လွှာပုံစံ လိုအပ်ပါသည်။" },
          { q: "လူနေထိုင်ခွင့် (BCC) မကျဘဲ နေထိုင်ခြင်းကို တိုင်ကြားနိုင်ပါသလား။", a: "ဟုတ်ကဲ့၊ စည်းကမ်းမလိုက်နာသော ဆောက်လုပ်ရေးလုပ်ငန်းများကို BCC စစ်ဆေးရေးကဏ္ဍသို့ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အဆောက်အအုံအတွင်း စည်းကမ်းမဲ့ လုပ်ငန်းသုံးစက်ကြီးများ တပ်ဆင်ခြင်းကို တိုင်ကြားလိုပါသည်။", a: "အသံဆူညံမှုနှင့် တုန်ခါမှုဖြစ်စေသော စက်ယန္တရားများအတွက် စစ်ဆေးပေးရန် တင်ပြနိုင်ပါသည်။" },
          { q: "ဆောက်လုပ်ရေးဆိုက်ထဲမှ ဖုန်မှုန့်နှင့် အမှိုက်များ ပျံလွင့်ခြင်းကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "ပတ်ဝန်းကျင်ညစ်ညမ်းမှု ဖြစ်စေသဖြင့် အဆောက်အအုံဌာနသို့ ကန့်ကွက်တိုင်ကြားနိုင်ပါသည်။" }
        ]
      },
      {
        id: "eng-sanitation",
        name: "အင်ဂျင်နီယာဌာန (ရေရရှိရေးနှင့်သန့်ရှင်းမှု)",
        questions: [
          { q: "စည်ပင်ရေပိုက်လိုင်း ပေါက်ပြဲပြီး ရေများလေလွင့်နေခြင်းကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "ရေပိုက်ပေါက်နေသော လမ်းနှင့် တည်နေရာအတိအကျကို ဓာတ်ပုံနှင့်တကွ ဤစနစ်တွင် လာရောက်သတင်းပို့နိုင်ပါသည်။" },
          { q: "မိမိအိမ်တွင် စည်ပင်ရေမလာပါက မည်သို့စုံစမ်းရမည်နည်း။", a: "မိမိတို့ရပ်ကွက်အတွင်း ရေဖြန့်ဝေမှုအချိန်ဇယား သို့မဟုတ် ပိုက်လိုင်းပြုပြင်နေမှုကို ရေရရှိရေးဌာနတွင် မေးမြန်းနိုင်ပါသည်။" },
          { q: "စည်ပင်ရေမီတာ အမျိုးအစားလဲလှယ်ခြင်း သို့မဟုတ် ပျက်စီးခြင်းကို ဘယ်လိုတင်ပြရမလဲ။", a: "ရေမီတာနံပါတ်နှင့်အတူ အသစ်လဲလှယ်ခွင့် လျှောက်လွှာကို စနစ်မှတစ်ဆင့် တင်ပြနိုင်ပါသည်။" },
          { q: "စည်ပင်ရေမှ အနည်များပါလာခြင်း သို့မဟုတ် မသန့်ရှင်းခြင်းကို တိုင်ကြားလိုပါသည်။", a: "ရေအရည်အသွေး စစ်ဆေးပေးရန်အတွက် သက်ဆိုင်ရာ ရေပေးဝေရေးစခန်းသို့ ဤစနစ်မှတစ်ဆင့် အကြောင်းကြားနိုင်ပါသည်။" },
          { q: "အိမ်သုံးရေပိုက်လိုင်းအသစ် လျှောက်ထားရာတွင် မည်မျှကြာတတ်ပါသလဲ။", a: "လျှောက်လွှာတင်ပြီးနောက် ကွင်းဆင်းစစ်ဆေးခွင့်ပြုချက်ရရှိရန် ရက်သတ္တပတ် ၂ ပတ်ခန့် ကြာမြင့်နိုင်ပါသည်။" },
          { q: "အိမ်နီးနားချင်းမှ စည်ပင်ရေကို မော်တာဖြင့် တိုက်ရိုက်စုပ်ယူနေခြင်းကို တိုင်ကြားနိုင်ပါသလား။", a: "ဟုတ်ကဲ့၊ ရေအင်အားနည်းပါးမှုဖြစ်စေသော စည်းကမ်းမဲ့ ရေစုပ်ယူမှုများကို တိုင်ကြားနိုင်ပါသည်။" },
          { q: "ရေဖိုးရေခပေးဆောင်ရန် ကျန်ရှိမှုကို ဘယ်လိုသိနိုင်မလဲ။", a: "မိမိတို့၏ ရေသုံးစွဲသူကုဒ်နံပါတ် (Consumer ID) ကို ရိုက်ထည့်၍ အခွန်စာရင်းတွင် စစ်ဆေးနိုင်ပါသည်။" },
          { q: "စည်ပင်ရေပိုက်လိုင်းများ လမ်းပေါ်တွင် စည်းကမ်းမဲ့ သွယ်တန်းထားခြင်းကို တိုင်ကြားလိုပါသည်။", a: "လမ်းသွားလမ်းလာ အန္တရာယ်ရှိသော အများသုံးလမ်းပေါ်က ရေပိုက်များကို ဖယ်ရှားပေးရန် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အဝီစိတွင်းတူးဖော်ခွင့် လျှောက်ထားခြင်းကို မည်သို့လုပ်ဆောင်ရမည်နည်း။", a: "မြေအောက်ရေ သုံးစွဲခွင့် ဥပဒေအရ စနစ်တွင် ဖော်ပြထားသော ပုံစံဖြင့် လျှောက်ထားရပါမည်။" },
          { q: "အများသုံးရေတိုင်ကီများ ပျက်စီးယိုယွင်းနေခြင်းကို မည်သို့အကြောင်းကြားရမည်နည်း။", a: "ရပ်ကွက်အလိုက် ရေပေးဝေရေးကန်များ ပျက်စီးမှုကို ရေရရှိရေးဌာနသို့ သတင်းပို့နိုင်ပါသည်။" }
        ]
      },
      {
        id: "eng-drainage",
        name: "အင်ဂျင်နီယာဌာန (ရေစီးရေလာစီမံခန့်ခွဲမှု)",
        questions: [
          { q: "မြောင်းများပိတ်ဆို့ပြီး မိုးရွာလျှင် ရေလျှံနေခြင်းကို ဘယ်လိုတိုင်ကြားရမလဲ။", a: "မြောင်းပိတ်ဆို့နေသည့် နေရာကို ရေစီးရေလာစီမံခန့်ခွဲမှုဌာနသို့ ဓာတ်ပုံနှင့်တကွ တင်ပြရှင်းလင်းခိုင်းနိုင်ပါသည်။" },
          { q: "အိမ်နီးနားချင်းမှ အများသုံးရေမြောင်းကို မြေဖို့ပြီး ပိတ်ဆို့ထားခြင်းကို တိုင်ကြားလိုပါသည်။", a: "ရေစီးရေလာ ပိတ်ဆို့မှုဖြစ်စေသော ကျူးကျော်မြေဖို့မှုများကို ချက်ချင်းတိုင်ကြားနိုင်ပါသည်။" },
          { q: "ကွန်ကရစ်ရေမြောင်းအဖုံးများ ကျိုးပျက်နေခြင်းကို မည်သို့အကြောင်းကြားရမည်နည်း။", a: "လူနှင့် မော်တော်ယာဉ်များ အန္တရာယ်မဖြစ်စေရန် မြောင်းအဖုံးလဲလှယ်ပေးဖို့ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "မိမိအိမ်ရှေ့တွင် ကွန်ကရစ်ရေမြောင်းအသစ် ပြုလုပ်ပေးရန် လျှောက်ထားလိုပါသည်။", a: "ရပ်ကွက်အလိုက် ရေမြောင်းစနစ်အဆင့်မြှင့်တင်ရန် ဤစနစ်၏ လျှောက်ထားမှုကဏ္ဍတွင် တင်ပြနိုင်ပါသည်။" },
          { q: "လုပ်ငန်းခွင်များမှ ရေဆိုးများကို အများသုံးရေမြောင်းထဲသို့ တိုက်ရိုက်စွန့်ပစ်နေခြင်းကို တိုင်ကြားချင်ပါသည်။", a: "ဓာတုပစ္စည်း သို့မဟုတ် ရေဆိုးညစ်ညမ်းမှုများအတွက် သက်ဆိုင်ရာဌာနသို့ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "မြောင်းများအတွင်း မြက်ပင်များနှင့် ဒလိမ့်ပင်များ ထူထပ်နေခြင်းကို မည်သို့လုပ်ရမည်နည်း။", a: "မြောင်းဆတ်ခြင်းနှင့် ပေါင်းမြက်ရှင်းလင်းခြင်းလုပ်ငန်း လုပ်ဆောင်ပေးရန် အကြောင်းကြားနိုင်ပါသည်။" },
          { q: "မိုးရာသီမတိုင်မီ မြို့နယ်အလိုက် ရေမြောင်းကြီးများ ဆယ်ယူမှုကို ဘယ်လိုသိနိုင်မလဲ။", a: "နှစ်စဉ် စီမံချက်အရ ဆောင်ရွက်ပေးလျက်ရှိပြီး မိမိတို့ရပ်ကွက်အတွက် စုံစမ်းမေးမြန်းနိုင်ပါသည်။" },
          { q: "မြောင်းကူးတံတားကို စည်းကမ်းမဲ့ အကျယ်ကြီး လုပ်ထားသဖြင့် မြောင်းဆယ်မရခြင်းကို တိုင်ကြားလိုပါသည်။", a: "မြောင်းဆယ်ယူရန် အခက်အခဲဖြစ်စေသော ကူးတံတားများကို စစ်ဆေးပေးရန် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အိမ်သာရေဆိုးများကို ရေမြောင်းထဲသို့ ဖောက်ချထားခြင်းကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "ကျန်းမာရေးနှင့် မညီညွတ်သော စည်းကမ်းမဲ့ ဖောက်ချမှုများကို ထိရောက်စွာ အရေးယူပေးရန် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "ရေမြောင်းထဲသို့ အမှိုက်များ စည်းကမ်းမဲ့ စွန့်ပစ်နေသူများကို တိုင်ကြားချင်ပါသည်။", a: "အမှိုက်ပစ်သူ၏ အထောက်အထား သို့မဟုတ် ဓာတ်ပုံမှတ်တမ်းဖြင့် ပူးတွဲတိုင်ကြားနိုင်ပါသည်။" }
        ]
      },
      {
        id: "env-sanitation",
        name: "မြို့ပြပတ်ဝန်းကျင်ထိန်းသိမ်းရေးနှင့်သန့်ရှင်းရေးဌာန",
        questions: [
          { q: "အမှိုက်ကား ပုံမှန်မလာရင် ဘယ်လိုတိုင်နိုင်မလဲ။", a: "ဤစနစ်ရှိ သန့်ရှင်းရေးဌာနကို ရွေးချယ်ပြီး မိမိတို့ ရပ်ကွက်/လမ်း အမည်နှင့် အမှိုက်ကား မလာသည့် ရက်အပိုင်းအခြားကို ဖော်ပြ၍ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "လမ်းဘေးတွင် အမှိုက်များ စုပုံနေပြီး အနံ့အသက်ဆိုးရွားနေခြင်းကို တိုင်ကြားလိုပါသည်။", a: "အမှိုက်ပုံတည်နေရာကို ဓာတ်ပုံနှင့်တကွ ပေးပို့ပါက သန့်ရှင်းရေးဌာနမှ အမြန်ဆုံး လာရောက်သိမ်းဆည်းပေးမည် ဖြစ်ပါသည်။" },
          { q: "အမှိုက်ပုံးအသစ် လမ်းထောင့်များတွင် ချထားပေးရန် မည်သို့တောင်းဆိုရမည်နည်း။", a: "အများသုံးအမှိုက်ပုံး လိုအပ်ချက်ကို ရပ်ကွက်အုပ်ချုပ်ရေးမှူးမှတစ်ဆင့် သို့မဟုတ် ဤစနစ်မှ တောင်းဆိုနိုင်ပါသည်။" },
          { q: "ဆေးရုံသုံး သို့မဟုတ် အန္တရာယ်ရှိ စွန့်ပစ်ပစ္စည်းများကို စည်းကမ်းမဲ့စွန့်ပစ်ထားခြင်းကို တွေ့ရှိပါက။", a: "အထူးအရေးပေါ် စွန့်ပစ်ပစ္စည်းအဖြစ် သတ်မှတ်၍ သန့်ရှင်းရေးဌာနသို့ ချက်ချင်းတိုင်ကြားပါ။" },
          { q: "စက်ရုံများမှ မီးခိုးနှင့် အနံ့ဆိုးများ ထွက်ပေါ်နေခြင်းကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "ပတ်ဝန်းကျင်လေထုညစ်ညမ်းမှုအတွက် စက်ရုံတည်နေရာနှင့်တကွ တိုင်ကြားစာ ပေးပို့နိုင်ပါသည်။" },
          { q: "အိမ်နီးနားချင်းမှ အမှိုက်များကို မီးရှို့သဖြင့် မီးခိုးမွှန်ခြင်းကို တိုင်ကြားလိုပါသည်။", a: "လေထုညစ်ညမ်းမှုနှင့် မီးဘေးအန္တရာယ်ရှိသဖြင့် ပတ်ဝန်းကျင်ထိန်းသိမ်းရေးကဏ္ဍသို့ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အမှိုက်ခွန် ကောက်ခံမှုနှုန်းထားများကို ဘယ်လိုသိနိုင်မလဲ။", a: "လူနေအိမ်နှင့် စီးပွားရေးလုပ်ငန်းအလိုက် သတ်မှတ်ထားသော လစဉ်အမှိုက်ခွန်နှုန်းထားများကို စနစ်တွင် ကြည့်ရှုနိုင်ပါသည်။" },
          { q: "လမ်းဘေးတွင် တိရစ္ဆာန်အသေကောင်များ ရှိနေပါက မည်သို့အကြောင်းကြားရမည်နည်း။", a: "ရောဂါပိုးမွှား ကာကွယ်ရန်အတွက် သန့်ရှင်းရေးအဖွဲ့မှ ချက်ချင်းလာရောက်ကောက်ယူနိုင်အောင် သတင်းပို့ပါ။" },
          { q: "ပလတ်စတစ်နှင့် ကတ်ထူပြားများ သီးသန့်ခွဲပစ်ရန် စနစ်ရှိပါသလား။", a: "အမှိုက်စို/အမှိုက်ခြောက် ခွဲခြားစွန့်ပစ်ခြင်း အစီအစဉ်များကို ဌာနမှ စတင်အကောင်အထည်ဖော်နေပြီ ဖြစ်ပါသည်။" },
          { q: "ချောင်းမြောင်းများအတွင်း အမှိုက်စွန့်ပစ်ခြင်းကို မည်သို့တားဆီးပေးသနည်း။", a: "စောင့်ကြည့်ကင်မရာများနှင့် ဒဏ်ရိုက်ခြင်းစနစ်များဖြင့် တားဆီးလျက်ရှိပြီး မိမိတို့လည်း တိုင်ကြားနိုင်ပါသည်။" }
        ]
      },
      {
        id: "markets",
        name: "ဈေးများနှင့်ကုန်စည်ဒိုင်များဌာန",
        questions: [
          { q: "စည်ပင်ဈေးအတွင်း ဆိုင်ခန်းများ လမ်းပေါ်ကျူးကျော်ရောင်းချခြင်းကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "ဈေးအမည်နှင့် ဆိုင်ခန်းအမှတ်ကို ဖော်ပြ၍ ဈေးများဌာနသို့ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "ဈေးသည်များမှ အလေးတင်းတောင်း မမှန်မကန် သုံးစွဲနေခြင်းကို ဘယ်လိုတိုင်ရမလဲ။", a: "ဈေးကော်မတီရုံးသို့ဖြစ်စေ၊ ဤစနစ်၏ ဈေးများဌာနတိုင်ကြားစာစာမျက်နှာမှဖြစ်စေ သတင်းပို့နိုင်ပါသည်။" },
          { q: "ဈေးအတွင်း အမှိုက်များနှင့် ငါးညှီရေများ စည်းကမ်းမဲ့ စွန့်ပစ်ထားခြင်းကို တိုင်ကြားလိုပါသည်။", a: "ဈေးသန့်ရှင်းရေး တာဝန်ခံများမှ ရှင်းလင်းပေးရန်အတွက် တိုင်ကြားစာ ပေးပို့နိုင်ပါသည်။" },
          { q: "စည်ပင်ဈေးများတွင် ဆိုင်ခန်းငှားရမ်းခွင့် လျှောက်ထားခြင်းကို ဘယ်လိုလုပ်ရမလဲ။", a: "လစ်လပ်သော ဆိုင်ခန်းစာရင်းများနှင့် တင်ဒါခေါ်ယူမှုများကို စနစ်တွင် စောင့်ကြည့်လျှောက်ထားနိုင်ပါသည်။" },
          { q: "ဈေးပြင်ပ လမ်းဘေးတွင် စည်းကမ်းမဲ့ ပျံကျဈေးသည်များ ပိတ်ဆို့နေခြင်းကို တိုင်ကြားချင်ပါသည်။", a: "လမ်းပိတ်ဆို့မှုဖြစ်စေသော ပျံကျဈေးသည်များအား စနစ်တကျနေရာချထားပေးရန် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "ဈေးအတွင်း မီးဘေးအန္တရာယ် စိုးရိမ်ရသော အခြေအနေများကို မည်သို့အကြောင်းကြားရမည်နည်း။", a: "ဝါယာရှော့ဖြစ်နိုင်ခြေ သို့မဟုတ် မီးသတ်ဆေးဘူးမရှိခြင်းများကို အရေးပေါ်အကြောင်းကြားနိုင်ပါသည်။" },
          { q: "ဈေးဆိုင်ခန်းလိုင်စင် သက်တမ်းတိုးခနှုန်းထားများကို ဘယ်လိုသိနိုင်မလဲ။", a: "ဆိုင်ခန်းအမျိုးအစားအလိုက် သတ်မှတ်ထားသော နှစ်စဉ်ကြေးများကို ဈေးများဌာနတွင် စစ်ဆေးနိုင်ပါသည်။" },
          { q: "ဈေးအတွင်း ခိုးမှု/လုယက်မှု ကာကွယ်ရေးအတွက် CCTV တပ်ဆင်ပေးရန် တောင်းဆိုလိုပါသည်။", a: "ဈေးလုံခြုံရေးတိုးမြှင့်ရန်အတွက် တင်ပြတောင်းဆိုချက် ပေးပို့နိုင်ပါသည်။" },
          { q: "ဈေးအတွင်း ရောင်းချခွင့်မရှိသော ကုန်ပစ္စည်းများ ရောင်းချနေခြင်းကို တိုင်ကြားလိုပါသည်။", a: "တရားမဝင်ပစ္စည်း သို့မဟုတ် တားမြစ်ဓာတုဆေးဝါးပါသော အစားအစာများကို တိုင်ကြားနိုင်ပါသည်။" },
          { q: "ဈေးအိမ်သာများ သန့်ရှင်းမှုမရှိခြင်းနှင့် ငွေပိုကောက်ခြင်းကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "သတ်မှတ်ဈေးထက် ပိုမိုကောက်ခံခြင်းနှင့် သန့်ရှင်းရေးအားနည်းမှုကို တိုင်ကြားနိုင်ပါသည်။" }
        ]
      },
      {
        id: "veterinary",
        name: "တိရစ္ဆာန်ဆေးကုနှင့်ထုတ်လုပ်ရေးဌာန",
        questions: [
          { q: "လမ်းဘေးလေလွင့်ခွေးများ များပြားပြီး လူကိုလိုက်ကိုက်နေခြင်းကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "ကာကွယ်ဆေးထိုးရန်နှင့် လေလွင့်ခွေးထိန်းသိမ်းရေးအဖွဲ့ လာရောက်စေရန် တည်နေရာပြ၍ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "တရားမဝင် သားသတ်ရုံများ ဖွင့်လှစ်ထားခြင်းကို တွေ့ရှိပါက ဘယ်လိုတိုင်ရမလဲ။", a: "ကျန်းမာရေးနှင့်မညီညွတ်သော တရားမဝင်သားသတ်ခြင်းများကို ဗေဒါဌာနသို့ လျှို့ဝှက်တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အိမ်မွေးတိရစ္ဆာန် လိုင်စင် ပြုလုပ်ရန် လိုအပ်ပါသလား။", a: "ဟုတ်ကဲ့၊ ခွေးနှင့် အိမ်မွေးတိရစ္ဆာန်များအတွက် နှစ်စဉ်လိုင်စင်နှင့် ကာကွယ်ဆေးကတ် ပြုလုပ်ထားရပါမည်။" },
          { q: "အသားစျေးကွက်အတွင်း သေဆုံးနေသော တိရစ္ဆာန်အသားများ ရောင်းချနေခြင်းကို တိုင်ကြားလိုပါသည်။", a: "အများပြည်သူ ကျန်းမာရေးအတွက် အရေးပေါ်စစ်ဆေးပေးရန် ချက်ချင်းတိုင်ကြားစာ ပေးပို့ပါ။" },
          { q: "ရပ်ကွက်အတွင်း ကြက်/ဝက် စည်းကမ်းမဲ့ အနံ့အသက်ဆိုးရွားစွာ မွေးမြူနေခြင်းကို တိုင်ကြားချင်ပါသည်။", a: "လူနေရပ်ကွက်အတွင်း မွေးမြူရေးစည်းကမ်းဖောက်ဖျက်မှုအဖြစ် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "တိရစ္ဆာန် ကူးစက်ရောဂါလက္ခဏာများ တွေ့ရှိပါက မည်သည့်ဌာနသို့ အကြောင်းကြားရမည်နည်း။", a: "တိရစ္ဆာန်ဆေးကုနှင့်ထုတ်လုပ်ရေးဌာန၏ အရေးပေါ်ရောဂါထိန်းချုပ်ရေးသို့ အကြောင်းကြားရပါမည်။" },
          { q: "ခွေးရူးပြန်ရောဂါ ကာကွယ်ဆေး အခမဲ့ထိုးနှံပေးခြင်း ရှိပါသလား။", a: "ဌာနမှ ရာသီအလိုက် ကွင်းဆင်းထိုးနှံပေးသည့် အစီအစဉ်များကို စနစ်တွင် ကြေညာပေးလေ့ရှိပါသည်။" },
          { q: "သားငါးစျေးကွက်များတွင် ဟော်မုန်းဆေး သုံးစွဲမှုကို ဘယ်လိုစစ်ဆေးပါသလဲ။", a: "ဌာနမှ ရှောင်တခင်စစ်ဆေးမှုများ ပြုလုပ်လျက်ရှိပြီး သံသယရှိပါက တိုင်ကြားနိုင်ပါသည်။" },
          { q: "တိရစ္ဆာန်ညှဉ်းပန်းနှိပ်စက်မှုများကို တွေ့ရှိပါက တိုင်ကြားနိုင်ပါသလား။", a: "ဟုတ်ကဲ့၊ တိရစ္ဆာန်ကာကွယ်စောင့်ရှောက်ရေး ဥပဒေအရ တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အိမ်မွေးခွေး ကာကွယ်ဆေးထိုးပြီးကြောင်း အထောက်အထားစာအုပ် ဘယ်လိုယူရမလဲ။", a: "စည်ပင်တိရစ္ဆာန်ဆေးခန်းများတွင် ထိုးနှံပြီး တိုက်ရိုက်ထုတ်ယူနိုင်ပါသည်။" }
        ]
      },
      {
        id: "revenue",
        name: "အခွန်ဌာန",
        questions: [
          { q: "စည်ပင်မြေခွန်နှင့် အိမ်ရာခွန်များကို Online မှတစ်ဆင့် ပေးဆောင်နိုင်ပါသလား။", a: "ဟုတ်ကဲ့၊ ဤစနစ်၏ e-Payment ကဏ္ဍတွင် Mobile Banking များဖြင့် တိုက်ရိုက်ပေးဆောင်နိုင်ပါသည်။" },
          { q: "အခွန်စည်းကြပ်မှုအပေါ် ကျေနပ်မှုမရှိပါက မည်သို့အယူခံဝင်နိုင်သနည်း။", a: "အခွန်ဌာနသို့ ပြန်လည်စစ်ဆေးပေးရန် အထောက်အထားများနှင့်တကွ အယူခံလွှာ တင်သွင်းနိုင်ပါသည်။" },
          { q: "လုပ်ငန်းလိုင်စင်ခများကို ဘယ်လိုတွက်ချက်ပါသလဲ။", a: "လုပ်ငန်းအမျိုးအစားနှင့် ဆိုင်အကျယ်အဝန်းအပေါ် မူတည်၍ သတ်မှတ်နှုန်းထားအတိုင်း တွက်ချက်ပါသည်။" },
          { q: "အခွန်နောက်ကျကြေး ဒဏ်ငွေများကို ဘယ်လိုကင်းလွတ်ခွင့် လျှောက်ရမလဲ။", a: "ခိုင်လုံသောအကြောင်းပြချက်ရှိပါက သက်ဆိုင်ရာ မြို့နယ်အရာရှိထံ တင်ပြလျှောက်ထားနိုင်ပါသည်။" },
          { q: "ဆိုင်းဘုတ်ခွန် ကောက်ခံခြင်း စည်းကမ်းချက်များကို သိလိုပါသည်။", a: "ဆိုင်းဘုတ်အမျိုးအစားနှင့် စတုရန်းပေအလိုက် ကောက်ခံပြီး ခွင့်ပြုချက်မရှိ ဆိုင်းဘုတ်များကို ဒဏ်ရိုက်ပါသည်။" },
          { q: "အိမ်ခြံမြေ အမည်ပြောင်းလဲခြင်းအတွက် အခွန်မည်မျှဆောင်ရမလဲ။", a: "ကာလတန်ဖိုးအပေါ် မူတည်၍ သတ်မှတ်ထားသော အခွန်ရာခိုင်နှုန်းအတိုင်း ဆောင်ရပါမည်။" },
          { q: "အခွန်ပြေစာ ပျောက်ဆုံးသွားပါက မိတ္တူပြန်လည်လျှောက်ထားနိုင်ပါသလား။", a: "ဟုတ်ကဲ့၊ မူလအခွန်ဆောင်ခဲ့သည့် အထောက်အထားဖြင့် အခွန်ရုံးတွင် ပြန်လည်လျှောက်ထားနိုင်ပါသည်။" },
          { q: "တရားမဝင် လုပ်ငန်းလိုင်စင်မရှိဘဲ လုပ်ကိုင်နေသူများကို တိုင်ကြားလိုပါသည်။", a: "လိုင်စင်မဲ့ စီးပွားရေးလုပ်ငန်းများကို အခွန်ဌာနသို့ လာရောက်တိုင်ကြားနိုင်ပါသည်။" },
          { q: "နှစ်ချုပ်အခွန် ပေးဆောင်ရမည့် သတ်မှတ်ရက်ကို ဘယ်လိုသိနိုင်မလဲ။", a: "ဘဏ္ဍာနှစ်အလိုက် အခွန်ပေးဆောင်ရမည့် နောက်ဆုံးရက်များကို စနစ်တွင် ကြေညာပေးပါသည်။" },
          { q: "အခွန်ငွေများကို စည်းကမ်းမဲ့ ပိုမိုကောက်ခံနေခြင်းကို တိုင်ကြားချင်ပါသည်။", a: "ဝန်ထမ်းများမှ ငွေပိုတောင်းခြင်း သို့မဟုတ် ခြစားမှုများကို တိုင်ကြားစာကဏ္ဍတွင် တိုက်ရိုက်တိုင်နိုင်ပါသည်။" }
        ]
      },
      {
        id: "city-planning",
        name: "မြို့ပြမြေယာစီမံခန့်ခွဲမှုဌာန",
        questions: [
          { q: "ဂရန်မြေကွက် လျှောက်ထားရာတွင် မည်သည့်စာရွက်စာတမ်းများ လိုအပ်ပါသလဲ။", a: "မြေပိုင်ဆိုင်မှုမှတ်တမ်း၊ မြေတိုင်းမြေပုံနှင့် လျှောက်ထားသူ၏ မှတ်ပုံတင်မိတ္တူများ လိုအပ်ပါသည်။" },
          { q: "မိမိမြေကွက်အတွင်း သူတစ်ပါးမှ ကျူးကျော်ဝင်ရောက်နေထိုင်ခြင်းကို မည်သို့တိုင်ရမလဲ။", a: "မြေယာပိုင်ဆိုင်မှု အထောက်အထားအပြည့်အစုံဖြင့် မြေယာဌာနသို့ တိုင်ကြားစာ ပေးပို့ရပါမည်။" },
          { q: "မြေပုံမြေရာဇဝင် (၁၀၅/၁၀၆) ကူးယူရန် ဘယ်လောက်ကြာတတ်ပါသလဲ။", a: "ရုံးလုပ်ငန်းစစ်ဆေးမှုများအပေါ် မူတည်၍ ရုံးဖွင့်ရက် ၂ ပတ်မှ ၄ ပတ်ခန့် ကြာမြင့်နိုင်ပါသည်။" },
          { q: "လယ်ယာမြေကို လူနေမြေအဖြစ် ပြောင်းလဲခွင့် လျှောက်ထားခြင်းကို ဘယ်လိုလုပ်ရမလဲ။", a: "ဗဟိုလယ်ယာမြေစီမံခန့်ခွဲမှုအဖွဲ့၏ ခွင့်ပြုချက်နှင့်တကွ မြေယာဌာနတွင် လျှောက်ထားရပါမည်။" },
          { q: "မြေကွက်ခွဲစိတ်ခွင့် လျှောက်ထားခြင်း စည်းကမ်းများကို သိလိုပါသည်။", a: "သတ်မှတ်ထားသော အနည်းဆုံးပေအကျယ်အဝန်း စံနှုန်းများနှင့် ညီညွတ်ပါက ကွက်ခွဲခွင့် လျှောက်နိုင်ပါသည်။" },
          { q: "ဂရန်မိတ္တူမှန် လျှောက်ထားခြင်းကို ဘယ်လိုလုပ်ရမလဲ။", a: "မူလဂရန်ပျောက်ဆုံးကြောင်း ရဲစခန်းထောက်ခံစာ၊ သတင်းစာကြေညာချက်တို့ဖြင့် လျှောက်ထားရပါမည်။" },
          { q: "မြေယာပိုင်ဆိုင်မှု အငြင်းပွားနေခြင်းကို စည်ပင်က ဖြေရှင်းပေးပါသလား။", a: "ပိုင်ဆိုင်မှုအငြင်းပွားခြင်းကို တရားရုံးတွင် ဖြေရှင်းရမည်ဖြစ်ပြီး စည်ပင်မှ မှတ်တမ်းအထောက်အထား ထုတ်ပေးနိုင်ပါသည်။" },
          { q: "အစိုးရမြေ သို့မဟုတ် လမ်းမြေကို ကျူးကျော်ရောင်းချနေခြင်းကို တိုင်ကြားလိုပါသည်။", a: "အများပြည်သူပိုင်မြေ ကျူးကျော်မှုများကို မြေယာစီမံခန့်ခွဲမှုဌာနသို့ ဓာတ်ပုံနှင့်တကွ တိုင်ကြားပါ။" },
          { q: "မိမိမြေကွက်၏ အဝိုင်းမြေပုံကို Online ကနေ ကြည့်လို့ရပါသလား။", a: "လက်ရှိတွင် စနစ်အတွင်း မြေပုံဒီဂျစ်တယ်စနစ် ပြောင်းလဲနေဆဲဖြစ်ပြီး ရုံးတွင် လာရောက်ကြည့်ရှုနိုင်ပါသည်။" },
          { q: "မြေကွက်အမည်ပေါက် ပြောင်းလဲခြင်း ပြီးစီးမှုကို ဘယ်လိုသိနိုင်မလဲ။", a: "လျှောက်လွှာအမှတ်စဉ်ကို အသုံးပြု၍ စနစ်၏ Application Tracking တွင် စစ်ဆေးနိုင်ပါသည်။" }
        ]
      },
      {
        id: "parks",
        name: "ပန်းဥယျာဉ်နှင့်အားကစားကွင်းများဌာန",
        questions: [
          { q: "ပန်းခြံအတွင်းရှိ ကစားစရာများနှင့် အားကစားပစ္စည်းများ ကျိုးပဲ့နေခြင်းကို မည်သို့တိုင်ရမလဲ။", a: "ပန်းခြံအမည်နှင့် ပျက်စီးနေသော ပစ္စည်းပုံစံကို ဖော်ပြ၍ ဤစနစ်မှတစ်ဆင့် ပြုပြင်ပေးရန် တောင်းဆိုနိုင်ပါသည်။" },
          { q: "လမ်းဘေး သစ်ပင်ကြီးများ လဲကျနိုင်သဖြင့် လာရောက်ခုတ်ထွင်ပေးရန် ဘယ်လိုပြောရမလဲ။", a: "အန္တရာယ်ရှိသော သစ်ပင် တည်နေရာကို ပြသ၍ ပန်းဥယျာဉ်ဌာနသို့ အရေးပေါ် ခုတ်ထွင်ပေးရန် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အများသုံးပန်းခြံအတွင်း ညဘက် လုံခြုံရေးအားနည်းပြီး စည်းကမ်းမဲ့နေခြင်းကို တိုင်ကြားလိုပါသည်။", a: "လုံခြုံရေးဝန်ထမ်းများ ပိုမိုချထားပေးရန်နှင့် စောင့်ကြည့်ပေးရန် တောင်းဆိုနိုင်ပါသည်။" },
          { q: "ရပ်ကွက်တွင်း အားကစားကွင်းတွင် စည်းကမ်းမဲ့ အမှိုက်ပစ်ခြင်းကို မည်သို့တားဆီးမလဲ။", a: "အားကစားကွင်း စီမံခန့်ခွဲမှုအဖွဲ့နှင့် ပန်းဥယျာဉ်ဌာနသို့ တိုင်ကြားစာ ပေးပို့နိုင်ပါသည်။" },
          { q: "ပန်းခြံများအတွင်း ဆိုင်ခန်းများ စည်းကမ်းမဲ့ ကျူးကျော်ခတ်ထားခြင်းကို တိုင်ကြားချင်ပါသည်။", a: "ခွင့်ပြုချက်မရှိဘဲ ဈေးရောင်းချနေသော ဆိုင်ခန်းများကို အရေးယူပေးရန် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "သစ်ပင်ခုတ်လှည့်ခွင့် လျှောက်ထားခြင်းကို ဘယ်လိုလုပ်ရမလဲ။", a: "မိမိအိမ်ခြံမြေအတွင်းရှိ သစ်ပင်ကြီးများ ခုတ်လှည့်လိုပါက ပန်းဥယျာဉ်ဌာန၏ ခွင့်ပြုချက် လိုအပ်ပါသည်။" },
          { q: "အများသုံးကစားကွင်းများတွင် မူးယစ်ဆေးဝါးသုံးစွဲသူများ ရှိနေခြင်းကို မည်သို့လုပ်ရမည်နည်း။", a: "ချက်ချင်း သက်ဆိုင်ရာ ရဲစခန်းနှင့် စည်ပင်လုံခြုံရေးကဏ္ဍသို့ ပူးတွဲတိုင်ကြားရပါမည်။" },
          { q: "မြို့နယ်အလိုက် ပန်းခြံအသစ်များ တည်ဆောက်ပေးရန် တင်ပြနိုင်ပါသလား။", a: "ဟုတ်ကဲ့၊ ပြည်သူ့အပန်းဖြေနေရာ လိုအပ်ချက် တင်ပြချက်အဖြစ် စနစ်တွင် အကြံပြုနိုင်ပါသည်။" },
          { q: "ပန်းခြံအတွင်း အိမ်မွေးတိရစ္ဆာန်များ ခေါ်ဆောင်ခွင့် ရှိပါသလား။", a: "ပန်းခြံအလိုက် စည်းကမ်းချက်များ ကွဲပြားပြီး သတ်မှတ်ကြိုးဖြင့် ထိန်းကျောင်းရပါမည်။" },
          { q: "လမ်းလယ်ကျွန်းများရှိ ပန်းပင်များ ပျက်စီးနေခြင်းကို မည်သို့အကြောင်းကြားရမည်နည်း။", a: "မြို့ပြလှပရေးအတွက် လမ်းလယ်ကျွန်းပြုပြင်ထိန်းသိမ်းရေးသို့ သတင်းပို့နိုင်ပါသည်။" }
        ]
      },
      {
        id: "public-relations",
        name: "ပြည်သူ့ဆက်ဆံရေးနှင့်ပြန်ကြားရေးဌာန",
        questions: [
          { q: "စည်ပင်သို့ တိုင်ကြားထားသော တိုင်ကြားစာ အခြေအနေကို ဘယ်လိုသိနိုင်မလဲ။", a: "မိမိ၏ တိုင်ကြားစာ ID (Complaint Ticket ID) ကို အသုံးပြု၍ 'တိုင်ကြားမှုအခြေအနေစစ်ဆေးရန်' တွင် ကြည့်ရှုနိုင်ပါသည်။" },
          { q: "စည်ပင်သာယာ၏ သတင်းထုတ်ပြန်ချက်များနှင့် စည်းကမ်းချက်များကို ဘယ်လိုဖတ်ရမလဲ။", a: "ဤစနစ်၏ 'သတင်းနှင့်ထုတ်ပြန်ချက်များ' (Announcements) စာမျက်နှာတွင် အမြဲမပြတ် ဖတ်ရှုနိုင်ပါသည်။" },
          { q: "တိုင်ကြားစာကို စနစ်က ပယ်ချ (Reject) လိုက်လျှင် ဘာလို့လဲဆိုတာ ဘယ်လိုသိရမလဲ။", a: "အထောက်အထားမခိုင်လုံခြင်း သို့မဟုတ် တည်နေရာမှားယွင်းခြင်းတို့ကြောင့် ဖြစ်နိုင်ပြီး အကြောင်းပြချက်ကို Ticket တွင် ဖတ်နိုင်ပါသည်။" },
          { q: "ပြည်သူ့အကြံပြုချက်များကို တင်ပြရန် သီးသန့်နေရာ ရှိပါသလား။", a: "ဟုတ်ကဲ့၊ Contact Us သို့မဟုတ် အကြံပြုစာပုံး (Suggestion Box) ကဏ္ဍတွင် ပေးပို့နိုင်ပါသည်။" },
          { q: "စည်ပင်ဝန်ထမ်းများ၏ ယဉ်ကျေးမှုမရှိခြင်းကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "ပြည်သူ့ဆက်ဆံရေးဌာန၏ ဝန်ထမ်းကျင့်ဝတ်စစ်ဆေးရေးသို့ တိုက်ရိုက်တိုင်ကြားနိုင်ပါသည်။" },
          { q: "တိုင်ကြားသူ၏ အချက်အလက်များကို လျှို့ဝှက်ပေးပါသလား။", a: "ဟုတ်ကဲ့၊ တိုင်ကြားသူ၏ လုံခြုံရေးအတွက် ကိုယ်ရေးအချက်အလက်များကို စနစ်မှ စနစ်တကျ လျှို့ဝှက်ပေးထားပါသည်။" },
          { q: "စည်ပင်မိုဘိုင်းအက်ပလီကေးရှင်း အသုံးပြုပုံလက်စွဲကို ဘယ်မှာဒေါင်းရမလဲ။", a: "ကူညီရွေးချယ်မှု (Help/FAQ) စာမျက်နှာအောက်ခြေတွင် User Manual PDF ကို ဒေါင်းလုဒ်ရယူနိုင်ပါသည်။" },
          { q: "သတင်းမှားများ ပျံ့နှံ့နေခြင်းကို မည်သို့စုံစမ်းရမည်နည်း။", a: "ပြန်ကြားရေးဌာန၏ တရားဝင်စာမျက်နှာများနှင့် ထုတ်ပြန်ချက်များကိုသာ အတည်ပြုယူရပါမည်။" },
          { q: "စည်ပင်ဟော့လိုင်း (Hotline) နံပါတ်က ဘယ်လောက်လဲ။", a: "စနစ်၏ အောက်ခြေ (Footer) တွင် ဖော်ပြထားသော ဖုန်းနံပါတ်များသို့ တိုက်ရိုက်ခေါ်ဆိုနိုင်ပါသည်။" },
          { q: "တိုင်ကြားစာတစ်ခုကို အရေးယူဆောင်ရွက်ရန် ယေဘုယျအားဖြင့် ဘယ်လောက်ကြာတတ်လဲ။", a: "တိုင်ကြားချက်အမျိုးအစားအပေါ် မူတည်၍ ၃ ရက်မှ ရုံးဖွင့်ရက် ၇ ရက်အတွင်း အကြောင်းပြန်ပေးပါသည်။" }
        ]
      },
      {
        id: "health",
        name: "ပြည်သူ့ကျန်းမာရေးဌာန",
        questions: [
          { q: "စားသောက်ဆိုင်များတွင် သန့်ရှင်းမှုမရှိခြင်းနှင့် ယင်ကောင်များစွဲနေခြင်းကို ဘယ်လိုတိုင်ရမလဲ။", a: "ဆိုင်အမည်နှင့် တည်နေရာကို ဖော်ပြ၍ ပြည်သူ့ကျန်းမာရေးဌာနသို့ ရှောင်တခင်စစ်ဆေးပေးရန် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "ရက်ကွက်တွင်း ခြင်ဆေးဖျန်းပေးရန် မည်သို့တောင်းဆိုရမည်နည်း။", a: "သွေးလွန်တုပ်ကွေး ကာကွယ်ရေးအတွက် ခြင်ဆေးဖျန်းပေးရန် ဤစနစ်မှတစ်ဆင့် တောင်းဆိုနိုင်ပါသည်။" },
          { q: "ရက်လွန်အစားအစာများနှင့် တားမြစ်ဓာတုဆေးဝါးပါသော အစားအစာများ ရောင်းချနေခြင်းကို တိုင်ကြားလိုပါသည်။", a: "စားသုံးသူဘေးအန္တရာယ်ကင်းရှင်းရေးအတွက် ကျန်းမာရေးဌာနသို့ ချက်ချင်းသတင်းပို့ တိုင်ကြားပါ။" },
          { q: "ရေတွင်းရေကန်များ ကျန်းမာရေးနှင့်အညီ ပိုးသတ်ဆေးခတ်ပေးရန် လိုအပ်ပါသည်။", a: "အများသုံးရေအရင်းအမြစ်များကို ကလိုရင်းခတ်ပေးရန် ကျန်းမာရေးဌာနသို့ လျှောက်ထားနိုင်ပါသည်။" },
          { q: "တရားမဝင် လိုင်စင်မဲ့ ဆေးခန်းများ ဖွင့်လှစ်ထားခြင်းကို တွေ့ရှိပါက။", a: "ပြည်သူ့ကျန်းမာရေး ဘေးအန္တရာယ်ရှိသဖြင့် စနစ်တကျ စစ်ဆေးအရေးယူရန် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "ဟိုတယ်နှင့် တည်းခိုခန်းများ၏ သန့်ရှင်းရေးလိုင်စင်ကို ဘယ်လိုစစ်ဆေးပါသလဲ။", a: "ဌာနမှ နှစ်စဉ် ရှောင်တခင်ကွင်းဆင်းစစ်ဆေးပြီး စံချိန်မမှီပါက လိုင်စင်ပိတ်သိမ်းပါသည်။" },
          { q: "ကူးစက်ရောဂါ အရေးပေါ်အခြေအနေ ဖြစ်ပွားပါက မည်သို့အကြောင်းကြားရမည်နည်း။", a: "ကျန်းမာရေးဌာန၏ အရေးပေါ်တုံ့ပြန်ရေးအဖွဲ့သို့ စနစ်မှဖြစ်စေ၊ ဖုန်းဖြင့်ဖြစ်စေ ချက်ချင်းအကြောင်းကြားပါ။" },
          { q: "လမ်းဘေးမုန့်ဟင်းခါးဆိုင်များတွင် ဆိုးဆေးသုံးစွဲမှုကို တိုင်ကြားချင်ပါသည်။", a: "အစားအသောက်နှင့် ဆေးဝါးကွပ်ကဲရေးအဖွဲ့ (FDA) နှင့် ပူးတွဲစစ်ဆေးနိုင်ရန် တိုင်ကြားနိုင်ပါသည်။" },
          { q: "အလှကုန်ပစ္စည်းများတွင် တားမြစ်ဓာတုဗေဒပစ္စည်းပါဝင်မှုကို မည်သို့တိုင်ကြားရမည်နည်း။", a: "ပစ္စည်းအမျိုးအစားနှင့် ဝယ်ယူခဲ့သည့်ဆိုင်ကို ဖော်ပြ၍ တိုင်ကြားစာ ပေးပို့နိုင်ပါသည်။" },
          { q: "ဆူညံသံများလွန်းသဖြင့် အိပ်မပျော်ခြင်း၊ စိတ်ရှုပ်ထွေးခြင်းဖြစ်ရသည်ကို ကျန်းမာရေးရှုထောင့်မှ တိုင်ကြားလိုပါသည်။", a: "ပတ်ဝန်းကျင်ဆူညံမှု ထိန်းချုပ်ရေးဥပဒေအရ စစ်ဆေးပေးရန် တင်ပြနိုင်ပါသည်။" }
        ]
      }
    ]
  },
  en: {
    title: "Frequently Asked Questions (FAQ)",
    backBtn: "Back to Departments",
    viewBtn: "View",
    departments: [
      {
        id: "eng-road",
        name: "Engineering Department (Roads and Bridges)",
        questions: [
          { q: "How to report potholes and damaged roads in our ward?", a: "You can log in to this Complaint System and submit a report via the 'Complain' page with the road name, landmarks, and photos." },
          { q: "How can I report unauthorized construction within road boundaries?", a: "You can submit a complaint by choosing the 'Roads and Bridges Department' with the exact location." },
          { q: "Which department should I notify if traffic lights or road signs are damaged?", a: "You can directly report it to the Engineering Department (Roads and Bridges)." },
          { q: "How do I check the status of a request for paving asphalt or concrete roads?", a: "You can check the status through the local township municipal office or via the inquiry section of this system." },
          { q: "How to complain about long-term dumping of construction materials on public roads?", a: "You can report obstructions with photo evidence to the Roads and Bridges Department." },
          { q: "How to report weak bridge structures or visible cracks?", a: "For public safety, please submit the bridge name and location as an urgent complaint." },
          { q: "How to report broken streetlights or dark streets in our ward?", a: "You can submit a maintenance request by providing the streetlight number or road name." },
          { q: "How will abandoned vehicles on public roads be removed?", a: "The relevant department will inspect and clear them in accordance with municipal regulations." },
          { q: "How to report vehicles driving on newly paved concrete roads before the set date?", a: "As this damages road quality, you can notify the office urgently or report via this system." },
          { q: "How to report shops encroaching onto road boundaries or sidewalks?", a: "You can submit a complaint with photos regarding shops blocking pedestrian paths." }
        ]
      },
      {
        id: "eng-building",
        name: "Engineering Department (Building)",
        questions: [
          { q: "How to report construction without permission?", a: "Take photos of the location and construction style, then submit them here." },
          { q: "What should I do if neighboring construction causes cracks in my house?", a: "Submit an urgent report to the Building Department with photos of the damage." },
          { q: "How can I track my building permit status?", a: "You can check by entering your application file number at the department office." },
          { q: "How to report old and unsafe buildings near collapse?", a: "Report the exact location to the Building Department for public safety inspection." },
          { q: "How to report unsafe scaffolding at high-rise construction sites?", a: "Submit a complaint regarding unsafe working environments through this system." },
          { q: "How to resolve boundary encroachment by a neighbor's fence?", a: "Submit a joint complaint to both the Land and Building Departments with land maps." },
          { q: "What documents are required to renew a building permit?", a: "You need the original permit booklet, proof of land ownership, and application forms." },
          { q: "Can I report a building being occupied without a BCC certificate?", a: "Yes, you can report non-compliant construction projects to the BCC Inspection section." },
          { q: "How to report unauthorized heavy machinery installation inside a building?", a: "You can submit a request to inspect machinery causing excessive noise and vibration." },
          { q: "How to report dust and debris flying from a construction site?", a: "You can submit a complaint for environmental nuisance to the Building Department." }
        ]
      },
      {
        id: "eng-sanitation",
        name: "Engineering Department (Water Supply & Sanitation)",
        questions: [
          { q: "How to report a burst municipal water pipe causing water wastage?", a: "Report the exact road and location with photos in this system." },
          { q: "What should I do if there is no municipal water supply at my house?", a: "Inquire about water distribution schedules or pipeline maintenance from the Water Department." },
          { q: "How to report a faulty or damaged municipal water meter?", a: "Submit a replacement request through the system along with your water meter number." },
          { q: "How to complain about sediment or unclean municipal water?", a: "Notify the relevant water distribution station through this system to check water quality." },
          { q: "How long does it take to apply for a new domestic water pipeline connection?", a: "It may take about two weeks to get approval after the field inspection." },
          { q: "Can I report a neighbor directly pumping municipal water using a motor?", a: "Yes, you can report unauthorized pumping that causes low water pressure for others." },
          { q: "How can I check my outstanding water bills?", a: "Enter your Consumer ID in the tax/billing section to check your statements." },
          { q: "How to complain about water pipes laid unsafely across public roads?", a: "Report pipes blocking public pathways to have them removed safely." },
          { q: "How do I apply for a permit to drill an artesian well?", a: "Apply using the form provided in the system according to groundwater laws." },
          { q: "How to report damaged public water storage tanks?", a: "Report damaged ward-level water tanks to the Water Supply Department." }
        ]
      },
      {
        id: "eng-drainage",
        name: "Engineering Department (Drainage Management)",
        questions: [
          { q: "How to complain about blocked drains causing floods when it rains?", a: "Submit photos of the blocked drains to the Drainage Management Department for cleaning." },
          { q: "How to report a neighbor filling up and blocking a public drain?", a: "You can instantly report unauthorized ground filling that blocks water flow." },
          { q: "How to report broken concrete drainage covers?", a: "Request a cover replacement to prevent danger to pedestrians and vehicles." },
          { q: "How can I request a new concrete drain in front of my house?", a: "Submit a proposal in the application section of this system for ward-level drainage upgrades." },
          { q: "How to report factories discharging wastewater directly into public drains?", a: "Submit a complaint to the relevant department regarding chemical or toxic wastewater." },
          { q: "How to report drains overgrown with weeds and wild plants?", a: "Notify the department to arrange drain clearing and weeding services." },
          { q: "How can I know the schedule for major drain dredging before the monsoon?", a: "Dredging is done annually; you can inquire for specific schedules in your ward." },
          { q: "How to report oversized private drain bridges blocking maintenance?", a: "Report private bridges that prevent municipal workers from cleaning the drains." },
          { q: "How to report septic tank wastewater being flushed into public drains?", a: "Report unhygienic and illegal flushing to seek strict enforcement action." },
          { q: "How to report people throwing garbage into the drainage system?", a: "Submit a complaint along with identity proof or photo evidence of the litterer." }
        ]
      },
      {
        id: "env-sanitation",
        name: "Urban Environmental Conservation and Cleaning Department",
        questions: [
          { q: "How to complain if the garbage truck does not arrive regularly?", a: "Select the Sanitation Department, enter your ward/street name and missed days to report." },
          { q: "How to report garbage piled on the roadside causing a foul smell?", a: "Send the location with photos; the department will clear it as soon as possible." },
          { q: "How can I request new public trash bins at street corners?", a: "Request through the ward administrator or submit a demand via this system." },
          { q: "What should I do if I find medical or hazardous waste dumped illegally?", a: "Report it immediately to the Sanitation Department as hazardous waste." },
          { q: "How to complain about smoke and bad odor coming from a factory?", a: "Submit a complaint with the factory location for air pollution inspection." },
          { q: "How to report a neighbor burning trash and causing heavy smoke?", a: "Report it to the Environmental section due to air pollution and fire risks." },
          { q: "Where can I check the garbage collection fee rates?", a: "Monthly garbage fee rates for residential and commercial properties are listed in the system." },
          { q: "How to report animal carcasses found on the roadside?", a: "Report it immediately so the sanitation team can collect it to prevent diseases." },
          { q: "Is there a system for separating plastic and cardboard waste?", a: "The department is starting to implement wet/dry waste separation programs." },
          { q: "How does the department prevent waste dumping into creeks and rivers?", a: "Prevention is done via surveillance cameras and fines; you can also report violations." }
        ]
      },
      {
        id: "markets",
        name: "Markets and Goods Depots Department",
        questions: [
          { q: "How to report shops encroaching onto pathways inside municipal markets?", a: "Report to the Markets Department with the market name and shop number." },
          { q: "How to report vendors using inaccurate scales and weights?", a: "Notify the market committee office or report via the complaint page of this system." },
          { q: "How to complain about garbage and fish wastewater dumped carelessly in markets?", a: "Submit a complaint to have market sanitation officers clear the area." },
          { q: "How do I apply for a shop rental lease inside municipal markets?", a: "Monitor and apply for vacant shop lists and open tenders announced in the system." },
          { q: "How to report illegal street vendors blocking roads outside markets?", a: "Request proper relocation of street vendors causing traffic jams." },
          { q: "How to report fire hazards or unsafe conditions inside a market?", a: "Report short-circuit risks or missing fire extinguishers urgently." },
          { q: "Where can I check market shop license renewal fees?", decline: "Annual fees based on shop categories can be checked in the Markets Department section." },
          { q: "How to request CCTV installation for theft prevention inside markets?", a: "Submit a request proposal to enhance market security infrastructure." },
          { q: "How to report prohibited goods being sold inside the market?", a: "Report illegal items or food containing banned chemical preservatives." },
          { q: "How to complain about dirty market toilets and overcharging?", a: "Report sanitation issues and fees collected above the specified rates." }
        ]
      },
      {
        id: "veterinary",
        name: "Veterinary and Slaughterhouses Department",
        questions: [
          { q: "How to report a high number of stray dogs chasing people?", a: "Report the location for vaccination and to alert the stray dog management team." },
          { q: "How to report illegal, unhygienic slaughterhouses?", a: "Submit a confidential report to the department to check unauthorized slaughtering." },
          { q: "Is it required to register a license for domestic pets?", a: "Yes, annual registration and vaccination cards are mandatory for dogs and pets." },
          { q: "How to report dead animal meat being sold in the meat market?", a: "Submit an urgent inspection report immediately for public health safety." },
          { q: "How to complain about foul-smelling poultry or pig farming in residential areas?", a: "Report it as a breeding regulation violation within residential zones." },
          { q: "Whom should I notify if I detect symptoms of animal contagious diseases?", a: "Contact the Emergency Disease Control section of the Veterinary Department." },
          { q: "Are rabies vaccinations provided for free by the department?", a: "Seasonal field vaccination programs are usually announced in the system." },
          { q: "How does the department check for hormone usage in meat and fish markets?", a: "The department conducts surprise checks; you can report any suspicious products." },
          { q: "Can I report cases of animal cruelty?", a: "Yes, you can file a complaint under the Animal Protection and Welfare Law." },
          { q: "How can I get a vaccination logbook for my pet dog?", a: "You can get it directly after vaccinating your pet at municipal veterinary clinics." }
        ]
      },
      {
        id: "revenue",
        name: "Revenue Department",
        questions: [
          { q: "Can I pay municipal land and property taxes online?", a: "Yes, you can pay directly via mobile banking in the e-Payment section of this system." },
          { q: "What should I do if I am unsatisfied with my tax assessment?", a: "You can submit an appeal letter with supporting evidence to the Revenue Department." },
          { q: "How are business license fees calculated?", a: "Fees are calculated based on the business type and shop floor area." },
          { q: "How can I apply for a waiver on late payment tax penalties?", a: "You can apply to the township officer with a valid, justifiable reason." },
          { q: "What are the rules regarding signboard tax collection?", a: "Taxes are levied per square foot based on signboard type; unlicensed signs face fines." },
          { q: "How much tax do I need to pay for a property name change?", a: "You must pay the specified tax percentage based on the current property valuation." },
          { q: "Can I re-apply for a copy if my tax receipt is lost?", a: "Yes, you can re-apply at the tax office with proof of the original payment." },
          { q: "How to report people operating commercial businesses without a license?", a: "You can report unlicensed business operations to the Revenue Department." },
          { q: "How can I know the deadline for annual tax payments?", a: "Deadlines for tax payments per fiscal year are announced inside the system." },
          { q: "How to complain about illegal overcharging or bribery by tax collectors?", a: "Report staff overcharging or corruption directly in the complaint section." }
        ]
      },
      {
        id: "city-planning",
        name: "Urban Land Management Department",
        questions: [
          { q: "What documents are required to apply for a land lease/grant (Grant)?", a: "You need land ownership records, land maps, and NRC copies of the applicant." },
          { q: "How to report trespassing or squating on my private land plot?", a: "Submit a complaint letter to the Land Department with complete ownership proof." },
          { q: "How long does it take to copy a land history map (Form 105/106)?", a: "It may take about 2 to 4 weeks depending on office verification processes." },
          { q: "How to apply for converting agricultural land into residential land?", a: "Apply at the Land Department along with permission from the Central Agricultural Land Committee." },
          { q: "What are the rules for subdividing a land plot?", a: "You can apply if the plot meets the minimum required dimensions and standards." },
          { q: "How to apply for a certified true copy of a lost Land Grant?", a: "Apply with a police report for the lost grant and a newspaper advertisement." },
          { q: "Does the municipality resolve land ownership disputes?", a: "Ownership disputes must be settled in court; the municipality can provide history records." },
          { q: "How to report illegal selling or trespassing on government or road land?", a: "Report public land encroachments with photos to the Land Management Department." },
          { q: "Can I view my land plot map online?", a: "Digital mapping is still in progress; currently, you can view it at the office." },
          { q: "How to check the completion status of a land ownership name change?", a: "You can track it using your application serial number in Application Tracking." }
        ]
      },
      {
        id: "parks",
        name: "Playgrounds and Parks Department",
        questions: [
          { q: "How to report broken playground rides or fitness equipment in public parks?", a: "State the park name and equipment type to request repairs through this system." },
          { q: "How to request trimming of large roadside trees that risk falling?", a: "Provide the tree location and report it to the Parks Department for urgent trimming." },
          { q: "How to report poor security and unruly behavior in a public park at night?", a: "Request more security guards to be deployed and ask for surveillance." },
          { q: "How to prevent littering at the local community sports field?", a: "Submit a complaint letter to the sports field management team and Parks Department." },
          { q: "How to report shops encroaching illegally inside public parks?", a: "Report unauthorized vendors selling items inside park boundaries for action." },
          { q: "How do I apply for a permit to cut down a large tree inside my compound?", a: "You need permission from the Parks Department before cutting down large trees." },
          { q: "What should I do if drug users are loitering inside public playgrounds?", a: "Report immediately to both the local police station and municipal security." },
          { q: "Can we submit a proposal to build a new park in our township?", a: "Yes, you can suggest it in the system as a public recreation space demand." },
          { q: "Are pets allowed inside public parks?", a: "Rules vary by park; pets must be kept on a leash if allowed." },
          { q: "How to report damaged plants on road dividers?", a: "Report it to the road divider maintenance section for urban beautification." }
        ]
      },
      {
        id: "public-relations",
        name: "Public Relations and Information Department",
        questions: [
          { q: "How can I track the status of a filed complaint?", a: "You can view it under 'Check Complaint Status' using your Ticket ID." },
          { q: "Where can I read municipal announcements and regulations?", a: "You can check them anytime on the 'Announcements' page of this system." },
          { q: "If my complaint is rejected by the system, how can I know why?", a: "Rejection reasons (e.g., lack of evidence) can be read directly on the Ticket." },
          { q: "Is there a specific section to submit public suggestions?", a: "Yes, you can send them via the Contact Us page or the Suggestion Box section." },
          { q: "How to report rude behavior or misconduct by municipal staff?", a: "You can report directly to the staff ethics inspection under the PR Department." },
          { q: "Is the identity of the complainant kept confidential?", a: "Yes, your personal data is securely hidden to ensure user safety." },
          { q: "Where can I download the user manual for the mobile application?", a: "You can download the User Manual PDF at the bottom of the Help/FAQ page." },
          { q: "How to verify if an online rumor regarding municipal laws is true?", a: "Always verify facts only via official announcements on the PR page." },
          { q: "What is the municipal hotline number?", a: "You can directly call the phone numbers listed in the footer of this system." },
          { q: "How long does it generally take to resolve a complaint?", a: "Depending on the category, responses are given within 3 to 7 working days." }
        ]
      },
      {
        id: "health",
        name: "Public Health Department",
        questions: [
          { q: "How to report restaurants with poor hygiene and fly infestations?", a: "State the shop name and location to request a surprise health inspection." },
          { q: "How to request mosquito fogging operations in our ward?", a: "Request fogging via this system to prevent Dengue Hemorrhagic Fever outbreaks." },
          { q: "How to report shops selling expired food or chemically adulterated food?", a: "Report immediately to the Health Department for consumer safety enforcement." },
          { q: "We need public wells and water ponds to be chlorinated/disinfected.", a: "Apply to the Health Department to have public water sources treated with chlorine." },
          { q: "What should I do if I discover an illegal, unlicensed medical clinic?", a: "Report it to the department for inspection due to public health risks." },
          { q: "How does the department check the sanitation licenses of hotels?", a: "The department conducts annual inspections and revokes licenses if standards fail." },
          { q: "Whom should I notify in case of a contagious disease emergency?", a: "Notify the Emergency Response Team via this system or phone instantly." },
          { q: "How to complain about artificial dye usage in street food stalls?", a: "Report to initiate joint inspections with the Food and Drug Administration (FDA)." },
          { q: "How to report cosmetic products containing banned chemicals?", a: "Submit a complaint stating the product type and the shop where it was bought." },
          { q: "How to complain about excessive noise affecting health and sleep?", a: "Submit a request for inspection under environmental noise control regulations." }
        ]
      }
    ]
  }
};

let currentLang = 'mm'; // Default ဘာသာစကား
let currentSelectedDeptId = null;

// --- UI rendering Functions ---

function renderDepartmentList() {
  const container = document.getElementById('departments-container');
  document.getElementById('faq-title').innerText = faqData[currentLang].title;
  container.innerHTML = '';

  faqData[currentLang].departments.forEach(dept => {
    const row = document.createElement('div');
    row.className = "flex items-center justify-between p-4 hover:bg-slate-50 transition-colors text-slate-700 font-medium text-sm md:text-base";
    row.innerHTML = `
      <div class="flex items-center space-x-3">
        <span class="w-1.5 h-1.5 bg-emerald-600 rounded-full"></span>
        <span>${dept.name}</span>
      </div>
      <button onclick="viewDepartment('${dept.id}')" class="flex items-center space-x-1 text-slate-500 hover:text-emerald-700 border border-slate-200 hover:border-emerald-500 bg-white px-3 py-1.5 rounded-md text-xs md:text-sm transition-all shadow-sm">
        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        <span>${faqData[currentLang].viewBtn}</span>
      </button>
    `;
    container.appendChild(row);
  });
}

function viewDepartment(deptId) {
  currentSelectedDeptId = deptId;
  const dept = faqData[currentLang].departments.find(d => d.id === deptId);
  if (!dept) return;

  document.getElementById('selected-dept-title').innerText = dept.name;
  document.getElementById('back-btn-text').innerText = faqData[currentLang].backBtn;
  
  const accordionContainer = document.getElementById('accordion-container');
  accordionContainer.innerHTML = '';

  dept.questions.forEach((item, index) => {
    const accordionItem = document.createElement('div');
    accordionItem.className = "border border-slate-200 rounded-lg overflow-hidden";
    accordionItem.innerHTML = `
      <button onclick="toggleAccordion(${index})" class="w-full flex items-center justify-between p-4 bg-slate-50 hover:bg-slate-100 text-left text-slate-800 font-medium text-sm md:text-base transition-colors focus:outline-none">
        <span>${item.q}</span>
        <svg id="icon-${index}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
      </button>
      <div id="content-${index}" class="hidden bg-white border-t border-slate-100 p-4 text-slate-600 text-sm md:text-base leading-relaxed">
        ${item.a}
      </div>
    `;
    accordionContainer.appendChild(accordionItem);
  });

  document.getElementById('dept-list-view').classList.add('hidden');
  document.getElementById('questions-view').classList.remove('hidden');
}

function toggleAccordion(index) {
  const content = document.getElementById(`content-${index}`);
  const icon = document.getElementById(`icon-${index}`);
  
  if (content.classList.contains('hidden')) {
    content.classList.remove('hidden');
    icon.classList.add('rotate-180');
  } else {
    content.classList.add('hidden');
    icon.classList.remove('rotate-180');
  }
}

function showDepartmentList() {
  currentSelectedDeptId = null;
  document.getElementById('questions-view').classList.add('hidden');
  document.getElementById('dept-list-view').classList.remove('hidden');
}

// Navbar က Language ခလုတ်တွေနဲ့ ချိတ်ဆက်ဖို့ရန် Function
function changeLanguage(lang) {
  if (currentLang === lang) return;
  currentLang = lang;
  
  if (currentSelectedDeptId) {
    renderDepartmentList(); 
    viewDepartment(currentSelectedDeptId);
  } else {
    renderDepartmentList();
  }
}


// Initial Load
document.addEventListener("DOMContentLoaded", () => {
  renderDepartmentList();
});
</script>
</section>











  <section id="contact" class="py-16 bg-slate-900 text-slate-300 scroll-mt-20 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-white mb-6">
                <span x-show="lang === 'MM'">ဆက်သွယ်ရန် (Contact Us)</span>
                <span x-show="lang === 'EN'">Contact Support</span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto mt-10">
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-10 h-10 rounded-full bg-teal-900/50 border border-teal-500 text-teal-400 flex items-center justify-center text-lg"><i class="fa-solid fa-location-dot"></i></div>
                    <span class="text-xs text-slate-400 uppercase tracking-wider font-bold">Address</span>
                    <p class="text-sm">Yangon</p>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-10 h-10 rounded-full bg-teal-900/50 border border-teal-500 text-teal-400 flex items-center justify-center text-lg"><i class="fa-solid fa-phone"></i></div>
                    <span class="text-xs text-slate-400 uppercase tracking-wider font-bold">Hotline</span>
                    <p class="text-sm font-semibold text-teal-400">1881</p>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-10 h-10 rounded-full bg-teal-900/50 border border-teal-500 text-teal-400 flex items-center justify-center text-lg"><i class="fa-solid fa-envelope"></i></div>
                    <span class="text-xs text-slate-400 uppercase tracking-wider font-bold">Email</span>
                    <p class="text-sm">support@ycdc.gov.mm</p>
                </div>
            </div>
        </div>
    </section>
    <!-- 🌐 6. MODERN FAT FOOTER -->
    <footer class="bg-slate-950 text-slate-400 pt-16 pb-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Col 1: Brand -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3 text-white">
                    <div class="w-10 h-10 bg-[#006666] rounded-full flex items-center justify-center font-bold text-sm">YCDC</div>
                    <span class="font-bold text-sm">Municipal Complaint System</span>
                </div>
                <p class="text-xs leading-relaxed text-slate-500">
                     Municipal Automated Complaint Routing and Management Dashboard Platform.
                </p>
            </div>
            <!-- Col 2: Quick Links -->
            <div>
                <h4 class="text-white text-xs font-bold tracking-wider uppercase mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#home" class="hover:text-white transition">Home</a></li>
                    <li><a href="#about" class="hover:text-white transition">About Us</a></li>
                    <li><a href="#departments" class="hover:text-white transition">Our Departments</a></li>
                    <li><a href="#departments" class="hover:text-white transition">FAQ</a></li>
                </ul>
            </div>
            <!-- Col 3: Services -->
            <div>
                <h4 class="text-white text-xs font-bold tracking-wider uppercase mb-4">Services</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition">Public Complaints</a></li>
                    <li><a href="#" class="hover:text-white transition">Department Routing</a></li>
                    <li><a href="#" class="hover:text-white transition">Real-time Ticket Tracking</a></li>
                    <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                </ul>
            </div>
            <!-- Col 4: Connect & Languages -->
            <div>
                <h4 class="text-white text-xs font-bold tracking-wider uppercase mb-4">Connect</h4>
                <p class="text-sm mb-4">Hotline: <span class="text-white font-semibold">1881</span></p>
                <!-- Bottom Language Selector Component -->
                <div class="inline-flex rounded-md shadow-sm text-xs bg-slate-900 p-1 border border-slate-800">
                    <button @click="lang = 'MM'" :class="lang === 'MM' ? 'bg-[#006666] text-white' : 'text-slate-400 hover:text-white'" class="px-3 py-1 rounded transition">မြန်မာ</button>
                    <button @click="lang = 'EN'" :class="lang === 'EN' ? 'bg-[#006666] text-white' : 'text-slate-400 hover:text-white'" class="px-3 py-1 rounded transition">English</button>
                </div>
            </div>
        </div>

        <!-- Divider & Bottom Credits -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-6 border-t border-slate-900 text-xs flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 text-slate-600">
            <p>&copy; 2026 Yangon City Development Committee. All rights reserved.</p>
            <p>Developed by: <span class="text-slate-400 font-medium">[Three Angels]</span></p>
        </div>
    </footer>

</body>
</html>