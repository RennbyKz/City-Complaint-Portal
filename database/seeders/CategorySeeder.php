<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryGroup;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $taxonomy = [
            [
                'name' => 'လမ်းနှင့်တံတားများ ပျက်စီးခြင်း',
                'name_en' => 'Roads & Bridges',
                'items' => [
                    ['လမ်းမကြီးများ ပျက်စီးခြင်း', 'Major roads damaged'],
                    ['လမ်းဘေးစင်္ကြံနှင့် ရေမြောင်းများ ပျက်စီးခြင်း', 'Sidewalks and roadside drains damaged'],
                    ['တံတားနှင့် လူကူးခုံတံတားများ ပျက်စီးခြင်း', 'Bridges and pedestrian overpasses damaged'],
                    ['လမ်းဘေး တူးဖော်မှု ပြဿနာများ (ကျင်းတူးပြီး စနစ်တကျ ပြန်မပြင်ခြင်း)', 'Roadside excavation not properly restored'],
                    ['လမ်းဘေး အန္တရာယ်ကင်းရှင်းရေး စက်ကိရိယာများ ပျက်စီးခြင်း (ဆိုင်းဘုတ်၊ မီးရောင်ခြယ်၊ အကာအရံများ)', 'Road safety equipment damaged (signs, reflectors, barriers)'],
                    ['လမ်းနယ်နိမိတ်ကျော် ပိတ်ဆို့ခြင်း', 'Road right-of-way encroachment/blockage'],
                ],
            ],
            [
                'name' => 'ရေရရှိမှုဆိုင်ရာ ပြဿနာများ',
                'name_en' => 'Water Supply',
                'items' => [
                    ['စည်ပင်ရေ မလာခြင်းနှင့် ရေအားနည်းခြင်း', 'No water supply or low water pressure'],
                    ['စည်ပင်ရေ အရည်အသွေးမကောင်းခြင်း', 'Poor water quality'],
                    ['ပင်မရေပိုက်လိုင်းများ ပေါက်ထွက်ခြင်း', 'Main water pipe leakage'],
                    ['မိလ္လာစနစ်နှင့် အညစ်အကြေး စွန့်ထုတ်မှု ပြဿနာများ', 'Sewage system and waste discharge issues'],
                    ['စည်ပင်ရေကူးကန်နှင့် အများသုံးရေကန်များ ပျက်စီးခြင်း', 'Public swimming pools/water tanks damaged'],
                ],
            ],
            [
                'name' => 'ရေစီးရေလာနှင့် ရေကြီးခြင်း',
                'name_en' => 'Drainage & Flooding',
                'items' => [
                    ['ရေမြောင်းများ ပိတ်ဆို့ခြင်းနှင့် ရေလှိုင်ခြင်း', 'Drains blocked / overflowing'],
                    ['မိုးရွာသွန်းပါက ရေကြီးရေဝင်ခြင်း', 'Flooding during rainfall'],
                    ['ရေမြောင်းများနှင့် အခြေခံအဆောက်အအုံ ပျက်စီးခြင်း', 'Drainage infrastructure damaged'],
                    ['ရေထိန်းစနစ်နှင့် စက်ပစ္စည်း ချို့ယွင်းခြင်း', 'Water control system/equipment malfunction'],
                ],
            ],
            [
                'name' => 'အမှိုက်နှင့် သန့်ရှင်းရေး ပြဿနာများ',
                'name_en' => 'Waste & Cleanliness',
                'items' => [
                    ['ရပ်ကွက်တွင်း အမှိုက်သိမ်းစနစ် အဆင်မပြေခြင်း', 'Neighborhood waste collection service issues'],
                    ['လမ်းဘေးနှင့် အများသုံးနေရာ စည်းကမ်းမဲ့ အမှိုက်စွန့်ခြင်း', 'Illegal dumping on roadsides/public areas'],
                    ['အမှိုက်ပုံးနှင့် အမှိုက်ကန်များ စနစ်တကျ မရှိခြင်း', 'Lack of proper waste bins'],
                    ['ပတ်ဝန်းကျင် ညစ်ညမ်းမှုနှင့် အနံ့ဆိုးထွက်ခြင်း', 'Environmental pollution and bad odor'],
                ],
            ],
            [
                'name' => 'မြေယာဆိုင်ရာ ပြဿနာများ',
                'name_en' => 'Land Management',
                'items' => [
                    ['မြေကွက်လွတ်များတွင် အမှိုက်နှင့် အညစ်အကြေးများ စွန့်ပစ်ခြင်း', 'Dumping on vacant land'],
                    ['ခွင့်ပြုချက်မဲ့ မြေအသုံးချမှုများနှင့် ကျော်ကျော်မှုများ', 'Unauthorized land use / encroachment'],
                    ['မြေကွက်ပိုင်ဆိုင်မှုနှင့် စာရွက်စာတမ်းဆိုင်ရာ ပြဿနာများ', 'Land ownership and documentation issues'],
                    ['အများပြည်သူဆိုင်ရာ နှောင့်ယှက်မှုများနှင့် ကန့်ကွက်မှုများ (ဆောက်လုပ်မှုကို ကန့်ကွက်ခြင်း)', 'Public nuisance/objection to construction'],
                    ['မြေယာမှု ကြောင့် ရေနံသို့ပြောင်း ပိတ်ဆို့ပြီး ရေကြီးခြင်း', 'Land alteration causing water diversion/flooding'],
                    ['မြေဂရန်နှင့် ပိုင်ဆိုင်မှုစာရွက်စာတမ်း အတုပြုလုပ်ခြင်း', 'Forged land grant/ownership documents'],
                    ['မြေယာအမည်ပေါက် လွှဲပြောင်းခြင်း ကြန့်ကြာမှု', 'Delay in land title transfer'],
                    ['အများပြည်သူပိုင်မြေပေါ်တွင် တရားမဝင် ကျော်ကျော် ဆောက်လုပ်ခြင်း', 'Illegal construction on public land'],
                ],
            ],
            [
                'name' => 'တိရစ္ဆာန်ဆိုင်ရာ ပြဿနာများ',
                'name_en' => 'Animal Control',
                'items' => [
                    ['လမ်းဘေး လွတ်လပ်ခွေးများ အန္တရာယ်ရှိခြင်း/ကိုက်ခဲခြင်း', 'Stray dogs dangerous / biting'],
                    ['လူနေအိမ်များတွင် တိရစ္ဆာန်(ဝက်/နွား/ကြက်) စည်းကမ်းမဲ့ မွေးမြူခြင်း', 'Unregulated livestock rearing in residential areas'],
                    ['ခွေးသေ/ကြောင်သေကောင်များ လမ်းဘေး သို့မဟုတ် မြောင်းထဲ စွန့်ပစ်ထားခြင်း', 'Dead animals dumped on roadside/drains'],
                    ['လိုင်စင်မရှိဘဲ ခွေးရောင်းဝယ်လုပ်ငန်းများ ပြုလုပ်ခြင်း', 'Unlicensed pet trading'],
                    ['အိမ်မွေးခွေးများ အဆက်မပြတ် ဟောင်၍ ဆူညံခြင်း/လမ်းပေါ် လွှတ်ထားခြင်း', 'Pet dogs barking constantly / left unleashed'],
                    ['လမ်းဘေးစင်္ကြံတွင် ကြက်/ဘဲများ ဖြင့် လမ်းပိတ် ရောင်းချခြင်း', 'Poultry sold blocking sidewalks'],
                ],
            ],
            [
                'name' => 'ယာဉ်ယန္တရားနှင့် ယာဉ်ကြီးများဆိုင်ရာ ပြဿနာများ',
                'name_en' => 'Vehicles & Heavy Trucks',
                'items' => [
                    ['အမှိုက်ကား/စည်ပင်ကားများ စည်းကမ်းမဲ့ မောင်းနှင်ခြင်း', 'Waste/municipal trucks driven recklessly'],
                    ['အမှိုက်ကားမှ အမှိုက်နှင့် အညစ်အကြေးရေများ လမ်းပေါ်ဖိတ်ကျခြင်း', 'Waste truck spilling debris/liquid on road'],
                    ['အဝေးပြေးဝင်း/ကားပါကင်များတွင် ပါကင်ကြေး ပိုမိုတောင်းခံခြင်း', 'Overcharging at bus stations/parking'],
                    ['ယာဉ်ကြီးများ လမ်းပိတ်ရပ်ထားခြင်း', 'Heavy trucks parked blocking the road'],
                    ['ယာဉ်ကြီးများမှ စက်ဆီ/ဒီဇယ်ဆီ/သဲကျောက်မြေများ လမ်းပေါ်ဖိတ်ကျခြင်း', 'Trucks spilling oil/diesel/gravel on road'],
                    ['ရပ်ကွက်ထဲသို့ ခွင့်ပြုချက်မရှိဘဲ ယာဉ်ကြီးများ ဝင်ရောက်ရပ်နားခြင်း', 'Heavy vehicles entering/parking in neighborhoods without permit'],
                ],
            ],
            [
                'name' => 'အဆောက်အအုံဆိုင်ရာ ပြဿနာများ',
                'name_en' => 'Buildings',
                'items' => [
                    ['ပါမစ် သို့မဟုတ် ခွင့်ပြုချက်မရှိဘဲ တရားမဝင် အဆောက်အအုံ ဆောက်လုပ်ခြင်း', 'Illegal construction without permit'],
                    ['လမ်းဘေး/စည်ပင်ပိုင်မြေပေါ်တွင် ဆောက်လုပ်ရေး စက်ကိရိယာများ စည်းကမ်းမဲ့ စုပုံထားခြင်း', 'Construction materials/equipment piled on public land'],
                    ['ဘေးအိမ် ဆောက်လုပ်မှု ကြောင့် မိမိအိမ် ထိခိုက်အက်ကွဲခြင်း', 'Neighboring construction damaging own house'],
                    ['ဟောင်းနွမ်းဆွေးမြည့်ပြီး ပြိုကျစိုးရိမ်ရသော အန္တရာယ်ရှိ အဆောက်အအုံဟောင်းများ', 'Dilapidated buildings at risk of collapse'],
                    ['အဆောက်အအုံ ခွင့်ပြုချက် ပုံစံအတိုင်း မဟုတ်ဘဲ ကျော်လွန် တိုးချဲ့ဆောက်လုပ်ခြင်း', 'Construction exceeding approved building permit'],
                    ['နေထိုင်ခွင့် (BCC) မရှိဘဲ လူဝင်ရောက်နေထိုင်ခြင်း', 'Occupancy without Building Completion Certificate (BCC)'],
                ],
            ],
            [
                'name' => 'ပန်းခြံနှင့် အားကစားကွင်းများဆိုင်ရာ ပြဿနာများ',
                'name_en' => 'Parks & Playgrounds',
                'items' => [
                    ['အန္တရာယ်ရှိသော သစ်ပင်/မီးကြိုးဖိနေသော သစ်ကိုင်းများ ခုတ်ထွင်ပေးရန်', 'Dangerous trees / branches on power lines need trimming'],
                    ['ကလေးအားကစားကွင်းတွင်း ကစားစရာများနှင့် ခုံများ ပျက်စီးနေခြင်း', 'Playground equipment and benches damaged'],
                    ['လမ်းလယ်ကျွန်းနှင့် လမ်းဆုံအဝိုင်း ရန်းခုံများ ပျက်စီးခြင်း', 'Median/roundabout railings damaged'],
                    ['ဥယျာဉ်ခြံများနှင့် အလှဆိုက်နေရာများ ညစ်ပတ်ခြင်း/အပင်များ သေဆုံးခြင်း', 'Parks and landscaped areas unkempt / plants dying'],
                    ['မြေလွတ်နေရာများတွင် အရှင်ရှင်များ လာရောက်စိုက်ပျိုးရန်', 'Request for tree planting on vacant land'],
                    ['စည်ပင်ရေတလောင်းကား/သစ်ကိုင်းခုတ်ကားများ လမ်းပိတ်ရပ်ထားခြင်း', 'Municipal water/pruning trucks blocking the road'],
                ],
            ],
            [
                'name' => 'ကြော်ငြာနှင့် ဝန်ဆောင်မှုဆိုင်ရာ ပြဿနာများ',
                'name_en' => 'Public Relations & Information',
                'items' => [
                    ['လမ်းဘေး ကြော်ငြာဘုတ်ကြီးများ ပျက်စီး/လဲကျလုနီးပါး ဖြစ်ခြင်း', 'Roadside billboards damaged / at risk of collapse'],
                    ['ဓာတ်တိုင်နှင့် လမ်းဘေးတွင် ကြော်ငြာစာရွက်များ စည်းကမ်းမဲ့ ကပ်ခြင်း', 'Unauthorized flyers posted on poles/roadside'],
                    ['ရပ်ကွက်တွင်း ပွဲတော်များ အချိန်လွန် ဆူညံခြင်း/လမ်းပိတ်ခြင်း', 'Neighborhood events too loud / blocking roads'],
                    ['YCDC Online ဝန်ဆောင်မှုနှင့် App များ သုံးစွဲ၍ မရခြင်း', 'YCDC online services/app not working'],
                    ['စည်ပင်ဝန်ထမ်းများ၏ ဝန်ဆောင်မှု မကောင်းခြင်း/လုပ်ငန်း ကြန့်ကြာခြင်း', 'Poor staff service / process delays'],
                ],
            ],
            [
                'name' => 'အစားအသောက်နှင့် ကျန်းမာရေးဆိုင်ရာ ပြဿနာများ',
                'name_en' => 'Public Health',
                'items' => [
                    ['စားသောက်ဆိုင် သို့မဟုတ် ကြော်မုန့်ဆိုင်များ ညစ်ပတ်ခြင်း', 'Unhygienic restaurants / snack stalls'],
                    ['ဈေးများတွင် ခွင့်မပြုဆေးဆိုးနှင့် တာရှည်ခံဟော်မုန်း သုံးစွဲခြင်း', 'Banned dyes/preservatives used in markets'],
                    ['ဈေးကွက်အတွင်း သက်တမ်းလွန် အစားအသောက်နှင့် ဆေးဝါးများ ရောင်းချခြင်း', 'Expired food/medicine sold in markets'],
                    ['ရပ်ကွက်အတွင်း သွေးလွန်တုပ်ကွေး ကာကွယ်ရန် ခြင်ဆေး ဖျန်းပေးရန် တောင်းဆိုခြင်း', 'Request for mosquito/dengue fogging'],
                    ['ဟင်းသီးဟင်းရွက်တွင် ပိုးသတ်ဆေးဓာတ်ကျန်နှင့် စားသုံးမှု အရည်အသွေး မကောင်းခြင်း', 'Pesticide residue / poor quality produce'],
                ],
            ],
            [
                'name' => 'ဈေးများနှင့် ကုန်စည်ဆိုင်ခန်းများဆိုင်ရာ ပြဿနာများ',
                'name_en' => 'Markets & Commodity Stalls',
                'items' => [
                    ['ဈေးတွင်း သန့်ရှင်းရေးနှင့် ကျန်းမာရေး (အမှိုက်များ စနစ်တကျ မသိမ်းဘဲ ပုပ်စပ်နေခြင်း)', 'Market hygiene — waste not properly collected, rotting'],
                    ['ဆိုင်တန်းသည်များ၏ လမ်းပိတ်ဆို့မှု (လူသွားလမ်းနှင့် ယာဉ်ကားများတွင် ကျော်ကျော် ရောင်းချခြင်း)', 'Street vendors blocking sidewalks/roads'],
                    ['ဆိုင်ခန်း စည်းကမ်းနှင့် လိုင်စင်ကိစ္စများ', 'Stall regulations and licensing issues'],
                    ['ဈေးရုံဇုန်များနှင့် အနံ့သက်ညစ်ညမ်းမှု (ဈေးရုံထွက် စွန့်ပစ်စက်ကိရိယာများကို စည်းကမ်းမဲ့ စွန့်ပစ်ခြင်း)', 'Market zone odor pollution — waste dumped without regulation'],
                ],
            ],
        ];

        foreach ($taxonomy as $index => $group) {
            $categoryGroup = CategoryGroup::create([
                'name' => $group['name'],
                'name_en' => $group['name_en'],
                'sort_order' => $index + 1,
            ]);

            foreach ($group['items'] as $itemIndex => [$name, $nameEn]) {
                Category::create([
                    'category_group_id' => $categoryGroup->id,
                    'name' => $name,
                    'name_en' => $nameEn,
                    'sort_order' => $itemIndex + 1,
                ]);
            }
        }
    }
}
