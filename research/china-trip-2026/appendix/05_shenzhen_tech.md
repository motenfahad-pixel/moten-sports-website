# 05 — Shenzhen / Guangdong Tech Supplier Research for ScoreX Smart-Court Camera System

Prepared: 2026-10-15 · Trip window: early November 2026 · Client: ScoreX (Karachi) — multi-court padel/tennis recording + streaming + analytics

## 0. Method and limits (read first)

- **Web fetch was unavailable in this session** (every WebFetch call failed DNS resolution, including Wikipedia), and the shared **web-search budget ran out** partway through Category D. So:
  - Facts below come from **search-result snippets**: trade-fair exhibitor pages (Embedded World, Security Essen, HKTDC), directories (IFSEC, asmag, EMVA, TI partner pages), datasheets, and marketplace listings. **No official company page was opened directly.** Every address, phone number and email must be re-checked on the official site before outreach.
  - Rows tagged **[NV]** (not verified this session) rely on general background knowledge, with no source found here. They need a check before anyone uses them.
  - Category E (PCB/PCBA/LED) and the trade-event calendar could not be searched. They are given from background knowledge and all tagged [NV].
- **Contacts:** only contacts that appeared in a source are listed. Where a source was a third-party directory rather than the company's own site, this is stated. No contact was invented.
- **Classification key** (as briefed): **A** = cameras / camera modules; **B** = video encoders / NVR / streaming; **C** = edge AI / industrial PC; **D** = networking / PoE; **E** = electronics manufacturing (PCB/PCBA, LED, ODM).
- **Camera sub-type key:** CCTV = security IP camera; IND = industrial/machine-vision camera; SPORT = AI sports/auto-tracking camera; PTZ/BC = PTZ, broadcast or conference camera; MOD = bare camera module (USB/MIPI) for OEM integration.

### What ScoreX actually needs (the lens used to rank suppliers)
1. **Per-court camera(s):** 4K or 2–5 MP at a fixed wide angle, ≥50–60 fps for ball tracking (global shutter preferred for fast ball/racket), RTSP/ONVIF, PoE, IP66 outdoor housing, and **hardware or NTP/PTP timestamp sync** across 2–4 cameras per court.
2. **Edge box per site:** Jetson Orin or RK3588 for ball/player detection and highlight clipping, multi-stream H.265 decode, local recording.
3. **Encoder/streaming:** SRT/RTMP uplink to cloud, or encoding on the edge box itself.
4. **PoE networking:** outdoor/industrial PoE+ switches, 100–250 m runs.
5. **Custom electronics:** court-side control/scoreboard PCBA and enclosures.

---

## 1. Summary shortlist (top picks)

| Cat | Pick | Why | District |
|---|---|---|---|
| A-IND | **MindVision (迈德威视)** | Shenzhen-based industrial GigE/USB3 global-shutter cameras, 0.3–20 MP, SDK, trigger I/O | Longhua |
| A-IND | **Do3think (度申)** | Shenzhen industrial camera maker (since 2007), EMVA member | Longhua (Dalang) |
| A-MOD | **Sinoseen** | OEM/ODM USB/MIPI modules incl. global shutter; IMX415 4K | Longhua (Guanhu) |
| A-MOD | **ELP / Ailipu** | USB global-shutter modules (AR0234 1080p90), custom builds | Nanshan |
| A-CCTV | **Sunell** | Shenzhen IP-camera maker with OEM/JDM focus | Nanshan |
| A-PTZ | **Telycam / Minrray / Tenveo** | NDI/IP PTZ with AI tracking (spectator/broadcast cam) | Longgang / Buji |
| A-SPORT | **OBSBOT (Remo Tech)** | AI auto-tracking cameras; Shenzhen R&D | Nanshan |
| B | **Unisheen, AVMATRIX, URayCoder, Zowietek** | Shenzhen H.265/SRT/NDI encoders | Shenzhen (district not confirmed) |
| C | **Seeed Studio** | Jetson reComputer + customization; HQ Nanshan | Nanshan |
| C | **Geniatech** | RK3588 edge AI boxes, own factory, OEM/ODM | Nanshan (Intl Innovation Valley) |
| C | **Radxa, EVOC** | RK3588 SBCs (Radxa); industrial PCs (EVOC) | Bao'an / Nanshan |
| D | **Utepo** | 250 m long-reach PoE, OEM/ODM stated | Bao'an |
| D | **3onedata** | Industrial PoE switches | Nanshan |
| D | **TP-Link (Omada/VIGI)** | Mainstream managed PoE | Nanshan |

**Not in Shenzhen (put them on a Hangzhou leg or a video call instead):** Hikvision, Dahua, Uniview, Hikrobot, iRAYPLE (all Hangzhou); Daheng (Beijing); Tiandy (Tianjin); Milesight (Xiamen); Kiloview (Changsha); Magewell (Nanjing); XbotGo (Suzhou per Preqin); Realtimes (Beijing); Firefly/T-Chip (Guangzhou/Zhongshan, so a day trip from Shenzhen is possible).

---

## 2. Category A — Cameras and camera modules

### 2.1 Detailed table

| # | Company | Website | HQ / factory | Type | OEM/ODM evidence | Relevant tech | Why useful for ScoreX | Public contact (source) | Meeting agenda (1 line) |
|---|---|---|---|---|---|---|---|---|---|
| A1 | **Shenzhen MindVision Technology (迈德威视)** | www.mindvision.com.cn (from catalogs; site not reachable from this session) | South China Co.: 5F, Bldg 6, Chiayiyuan Sci-Tech Park, Huaning Rd, **Longhua**, Shenzhen. Also Changsha and Wuxi offices | IND | Manufacturer of its own product line. Custom work not confirmed | Global shutter 0.3–20 MP; GigE (MV-GE/GEF series), 10GigE (MV-XGC903 9 MP), USB3 (MV-SUA231 2.3 MP); trigger and flash-sync I/O; "compatible with GigE camera SDK" | Strongest **Shenzhen-local global-shutter** source. Hardware trigger allows frame-sync of multiple cameras per court | Tel conflicts: 400-828-4478 vs 400-998-7281 (DirectIndustry catalogs). Verify | Demo 2–5 MP GS GigE at ≥60 fps; multi-cam hardware-trigger sync; IP66 housing options; Linux/ARM SDK on Jetson/RK3588 |
| A2 | **Shenzhen Do3think Technology (度申)** | Not confirmed (EMVA page links to it) | 4F, Bldg 3, Chaohuilou Sci Park, 119 Huating Rd, Dalang, **Longhua** (one directory). Another lists Evergrande Fashion Huigu Bldg, Longhua | IND | "Design, development and manufacturing of industrial cameras since 2007" (EMVA / A3 listings) | Area-scan industrial cameras (spec not retrieved) | Second Longhua industrial-camera option, so it can share a day with MindVision | Made-in-China storefront co_do3think01 (contact person listed as Karen Lee) | Compare GS USB3/GigE price at 50–200 units; GenICam support; outdoor variants |
| A3 | **ShenZhen Sinoseen Technology** | (Embedded World listing) | 2F, Bldg C, No. 17 Chuangxin Industrial Park, Xintian Community, Guanhu St, **Longhua**, 518110 | MOD (also "industrial cameras") | **Explicit OEM/ODM**: "OEM/ODM customized CMOS image processing… from design to after-sales" (founded 2009) | USB2/3, MIPI, DVP, HDMI, CVBS modules; VGA–32 MP; **rolling or global shutter** options; IMX415 8MP 4K MIPI (HKTDC) | Custom sensor/lens/FOV module for an in-house ScoreX camera, or for direct attach to a Jetson | +86 18025805518 (Embedded World exhibitor page) | Custom GS module (AR0234 / IMX296 class) with M12 wide lens; MIPI-to-Jetson; MOQ and NRE |
| A4 | **ShenZhen Ailipu Technology (ELP)** | Official site not confirmed | 1311-1313 Bldg Tianliao, Tangchang Rd, Tanglang Community, Taoyuan St, **Nanshan** (Made-in-China listing) | MOD / USB cameras | Founded 2005; "designs and manufactures all kinds of USB camera module", invites custom requirements | **AR0234 global-shutter USB 1080p @ 90 fps**, 1 MP GS 60 fps; UVC | Cheap prototyping cams for the ball-tracking R&D rig | Made-in-China co_ellipe (contact: Ms. Lizzy Liu, Sales) | Samples of GS USB3 modules; outdoor housing; lens options; MOQ |
| A5 | **Arducam** | arducam.com | Not confirmed (thought to be Shenzhen/HK-linked [NV]) | MOD | Product pages describe **end-to-end custom design, concept to mass production** (sensor, lens, interface, ISP, housing) | GS USB3 UVC AR0234 1920×1200 **100 fps**; external trigger available via customization; GMSL2 IP67 GS module; Jetson MIPI | Fastest route to a Jetson-ready GS camera; GMSL2 IP67 suits outdoor long cable runs | Not found | Custom GMSL2/USB3 GS camera with hardware trigger; Jetson Orin drivers |
| A6 | **Sunell Technology** | sunellsecurity.com | 22-23F, Bldg 2, Chongwen Park, Nanshan Zhiyuan Ph.3, 3370 Liuxian Ave, **Nanshan**, 518052 (2024 selection guide). Factories: Shenzhen + Vietnam, Taiwan, Japan | CCTV | Aggregator says focus on **OEM and JDM**. Official site states multi-country manufacturing | IP cameras, ONVIF, H.265 (portfolio) | Shenzhen-based OEM IP camera with custom firmware potential; a credible alternative to Hikvision/Dahua for white-label | **sales@sunellsecurity.com** (2024 selection guide PDF) | 4K / 4MP 60fps bullet with RTSP/ONVIF; custom firmware hooks (NTP/PTP time, metadata); OEM branding terms |
| A7 | **Shenzhen Yyton Digital (Anpviz brand)** | anpvizsecurity.com (not verified) | 4/F, Bldg T2, Lijincheng Center, Longhua St, **Longhua** (Security Essen 2026) | CCTV | "Formerly a security product OEM manufacturer" (eBay storefront); "ONVIF solutions, technical backup for partners" | PoE IP cameras, NVRs, ONVIF; FCC/CE/RoHS stated | Low-cost ONVIF/RTSP PoE cameras for budget courts | Contact named Ethan Lai (Security Essen); no email/phone | 4K PoE bullet, RTSP latency, firmware customization, price at 100 units |
| A8 | **Shenzhen Apexis Electronic** | (b2brazil hotsite) | Office: Nanshan Hi-Tech Park. Factory: Shajing, **Bao'an** (unverified listing) | CCTV | "Early IP camera factory offering OEM/ODM" | IP cameras | OEM IP-camera factory visit in Bao'an | Not found | Factory audit; custom firmware capability |
| A9 | **Minrray Industry** (BizConf subsidiary since 2018) | minrray.com (unreachable this session) | ZhongHaiXin Sci-Tech Park, Ganli Rd, Buji, **Longgang**, 518112 (asmag/IFSEC/PitchBook) | PTZ/BC | Not confirmed | HD/4K PTZ, education auto-tracking cameras | Broadcast/"TV" camera for a centre court, or for the stream's wide shot | +86 755 3328 8550 (IFSEC directory) | AI-tracking 4K PTZ with NDI/SRT; API control; OEM possibility |
| A10 | **Telycam** | (not found) | 6F, Bldg A, Shuanghuan IT Industrial Park, Baoqing Rd, **Longgang**, 518112 | PTZ/BC | Listed as an OEM PTZ maker | NDI/IP PTZ for live production | Same use as Minrray; it is nearby, so both fit one Longgang half-day | Not found | NDI HX3 / SRT PTZ, tracking SDK, OEM |
| A11 | **Tenveo** (possibly "Shenzhen Tongveo Video Tech" — unconfirmed) | (Lazada/Newegg) | Shenzhen; "B-8F Fukang Technology Mansion" (unverified directory) | PTZ/BC | Directory claims 19+ yrs OEM/ODM/JDM (conflicting founding dates) | 4K NDI, 20x zoom, AI auto-tracking, PoE, USB3, SDI | Budget AI-tracking PTZ | Not found | Confirm entity; NDI/SRT; tracking API |
| A12 | **OBSBOT (Remo Intelligent Technology (Shenzhen))** | obsbot.com | 15F, Block A, Bldg 7, Ph.3, Shenzhen International Innovation Valley, Xili, **Nanshan** (CB Insights) | SPORT / PTZ | Not confirmed; consumer brand | AI tracking/auto-framing PTZ (Tail, Tiny); NDI on Tail Air [NV] | AI-director camera know-how; potential partner for a "follow the rally" camera | Not found | SDK/API access for tracking; B2B/OEM appetite |
| A13 | **Insta360 (Arashi Vision)** — STAR 688775 | insta360.com | Bldg 2, Jinlitong Financial Center, 1100 Xingye Rd, Xin'an St, **Bao'an** (Morningstar). Alt: Foresea Life Center, Bao'an | SPORT (360/action) | Unlikely to do OEM | 360° 8K, AI reframing | Reference or benchmark only; low OEM likelihood | Not found | Optional: Insta360 Pro/enterprise SDK for 360 court views |
| A14 | **XbotGo** | xbotgo.com | **Suzhou** per Preqin (not Shenzhen) | SPORT | Unknown | AI ball/player tracking phone gimbal (Chameleon) | Direct conceptual competitor/partner for AI sports filming | Not found | Video call only: licensing tracking AI? |
| A15 | **Hikrobot** | hikrobotics.com | No. 700 Dongliu Rd, Binjiang, **Hangzhou** (not Shenzhen) | IND | Large manufacturer | GigE/USB3/10GigE/CoaXPress GS cameras, MVS SDK | Benchmark industrial cameras; Shenzhen sales office unconfirmed | hikrobot@hikrobotics.com, +86-571-88967998 (directory) | Ask for a Shenzhen office demo; price vs MindVision |
| A16 | **Daheng Imaging** (Daheng Tech 600288) | daheng-imaging.com | 12F Daheng S&T Tower, 3 Suzhou St, Haidian, **Beijing** | IND | Manufacturer | MER2/MER3 GS USB3/GigE (e.g., MER2-160-227U3: 1.6 MP @ 227 fps) | High-fps GS benchmark | isales@daheng-imaging.com, +86 10 82828878 (datasheets) | Remote call / sample order |
| A17 | **Milesight** | milesight.com | **Xiamen** HQ (brochure) | CCTV | Made-in-China profile says OEM (third party) | ONVIF G/M/S/T; open API/SDK (Elioplus) | Strong SDK/IP-camera alternative outside Shenzhen | Not found | Remote call: SDK, AI-cam, OEM terms |
| A18 | Hikvision / Dahua / Uniview / Tiandy / iRAYPLE | — | Hangzhou ×4, Tianjin [NV] | CCTV / IND | Large-scale | ISAPI/SDK, ONVIF | Mass-market cameras via Shenzhen distributors; not ODM partners for a startup | — | Buy through a local distributor if needed |

Not found or could not be verified: **Shenzhen Sunba, Topsee, Sinocam, Kayeton (KYT; Alibaba-only, OV4689 rolling shutter 60/120/330 fps; separate GS 720p120 model), Hampo, Jovision (Jinan-based [NV]), VStarcam, Besder, Kato Vision, JJTS.** These were not added to the shortlist.

### 2.2 Technical note for the camera choice
- **Industrial global shutter (MindVision/Do3think/Hikrobot/Daheng):** best image quality for ball tracking and true hardware trigger sync. However, there is **no on-board H.265 encode**; they need an edge PC with GigE/USB3 ingest. Outdoor IP66 housing must be added.
- **OEM IP camera (Sunell/Anpviz/Apexis):** RTSP/ONVIF, H.265, PoE and IP66 out of the box, so it is cheapest per court. Rolling shutter and typically 25–30 fps (some models do 60 fps); sync is NTP-only. Ask for custom firmware with 60 fps and PTP.
- **Camera module (Sinoseen/ELP/Arducam):** best for a **ScoreX-branded camera** (module + Jetson/RK3588 in one IP66 box). Needs enclosure/thermal design (Category E).

---

## 3. Category B — Video encoders / NVR / streaming

| # | Company | Website | Location | Product | OEM/ODM evidence | Tech | Why useful | Contact | Agenda |
|---|---|---|---|---|---|---|---|---|---|
| B1 | **Shenzhen Unisheen Technology** | Alibaba storefront | Shenzhen (eBay seller location; district unknown) | Encoders/decoders | Alibaba verified supplier, 8 yrs; MOQ 1 pc listed | 4K H.265 PoE HDMI encoder with loop-out; 8-in-1 H.265 HDMI→IP; SRT; JM1000 4K decoder | Converts any HDMI camera or scoreboard feed to SRT/RTMP; multi-channel boxes for 4–8 courts | Alibaba only | Multi-input SRT encoder; API for start/stop; private label |
| B2 | **URayCoder (URayTech)** | (retail) | Legal entity / Shenzhen location not confirmed | Encoders/decoders | Unknown | H.265/H.264 4K HDMI encoders, 4-ch SDI; SRT, RTSP, RTMP(S), HLS, ONVIF | Low-cost SRT uplink | Not found | Confirm entity first |
| B3 | **AVMATRIX** | (DigiKey supplier page) | Shenzhen, founded 2011 | Switchers, streaming encoders (SE1217 H.265), PTZ | Designs and manufactures (FPGA-based) | HDMI/SDI encode, switching | Production gear for a featured-court broadcast | Not found | Encoder + switcher bundle; OEM |
| B4 | **Zowietek (ZowieBox)** | (NDI product finder) | China; Shenzhen not confirmed | NDI HX3 encoder/decoder | Unknown | HDMI/UVC→NDI/SRT/RTMP/RTSP, PoE, **REST API** (Pro) | **UVC-to-network** bridge with PoE and API, which suits USB GS cameras | Not found | API docs; UVC GS camera passthrough |
| B5 | **Shenzhen Haiwei Vision** (closest match to "Haiweixun/HWX"; same company not confirmed) | Alibaba | Shenzhen | Encoders (H3418) | 11 yrs Alibaba | H.264, SRT | Backup encoder source | Alibaba only | — |
| B6 | **Orivision** | — | Listings show **Nantong (Jiangsu)**, not Shenzhen | OEM encoders/decoders | Press releases claim "OEM video decoder leader" (promotional) | HEVC HDMI, SRT, RTMPS | OEM encoder board if ScoreX wants its own box | Not found | Remote call |
| B7 | NVR OEMs: **Banovision, FSAN, CamSight, Veacam** | Made-in-China | Shenzhen (directory) | NVR | OEM/ODM listed (self-reported) | H.265 NVR | Local recording appliance if not using edge PC | Marketplace | Firmware rights; recording API |
| — | Kiloview (Changsha), Magewell (Nanjing) | kiloview.com / magewell.com | Not Shenzhen | NDI/SRT encoders, capture | Large brands | Pro-grade | Benchmark | — | Remote |

**View:** ScoreX should probably **encode on the edge box** (Jetson/RK3588 HW H.265 + SRT). Use B-suppliers only for HDMI sources (scoreboard, PTZ) or as a fallback.

---

## 4. Category C — Edge AI / industrial PCs

| # | Company | Website | Location | Product | OEM/ODM evidence | Tech | Why useful | Contact | Agenda |
|---|---|---|---|---|---|---|---|---|---|
| C1 | **Seeed Studio** | seeedstudio.com | 9F, Bldg G3, TCL International E City, Zhongshanyuan Rd, **Nanshan** | reComputer Jetson (Orin Nano/NX/AGX), RK3588 AI box, carrier boards | Catalog: "customization services… based on full Jetson range"; Seeed Fusion PCBA [NV] | Jetson Orin, multi-GMSL/USB/PoE carriers | Primary edge-AI partner: one supplier for box + custom carrier + PCBA | +86-755-8609-5676 (TI partner page) | Custom carrier: 4× GMSL2 or 2× 2.5GbE PoE-in, IP65 box, JetPack BSP, volume pricing |
| C2 | **Geniatech** | geniatech.com | 10F, Bldg 8A, Shenzhen International Innovation Valley, **Nanshan**. Own factory (location not given) | RK3588 AI boxes (APC3588-AI, G6-F1-RK3588), NXP i.MX95 box | **"Own production factory, one-stop OEM/ODM"**, 100+ R&D | RK3588 6 TOPS NPU, multi-stream decode | Lower-cost edge box (RK3588 decodes 16+ 1080p H.265) | **sales@geniatech.com, +86 755 86028588** (directory) | RK3588 box with 4–8 PoE ports; RKNN model support; ODM pricing |
| C3 | **Radxa** | radxa.com | Block B, FengHuang Zhigu Bldg, 50 Tiezai Rd, Xixiang, **Bao'an**, 518102 (third-party directory) | RK3588 SBCs (ROCK 5 series) | Founded 2012 Shenzhen. ODM not confirmed | RK3588/RK3588S | Prototype boards and a potential custom board | Not found | Industrial-temp ROCK 5 + custom carrier |
| C4 | **EVOC Intelligent Technology** | evoc.cn [NV] | EVOC Technology Bldg, 31 Gaoxin Central Ave 4th, **Nanshan**, 518057 (listed as factory address too) | Industrial PCs, embedded boards (since 1993) | Manufacturer, R&D + production | x86 IPC, fanless | Rugged x86 NVR/edge server for larger clubs | Not found | Fanless IPC with GPU slot; 5-yr supply |
| C5 | **Beelink (Shenzhen AZW Technology)** | bee-link.com [NV] | Shenzhen | Mini PCs | One secondary source says it does ODM/OEM | x86 mini PC (Intel N-series, AMD with NPU) | Cheap club-side viewer/kiosk PC | Not found | ODM mini-PC with ScoreX image |
| C6 | **Minisforum (Shenzhen Meigao Electronic Equipment)** | minisforum.com | Shenzhen HQ + production (NASCompares visit) | Mini PCs | R&D + production integrated | AMD Ryzen AI mini PCs | Same as Beelink | Not found | — |
| C7 | **Mekotronics** | — | Not confirmed (Rockchip IPC designer) | Rockchip IPCs, new Jetson Orin AI box (Jul 2026) | Alibaba store | Orin Nano/NX, PoE port, −25–80°C | Industrial-temp Jetson box | Not found | — |
| C8 | **Firefly (T-Chip)** | t-firefly.com [NV] | Guangzhou HQ [NV]; founded Zhongshan 2005 | RK3588 AI boards (AIO-3588Q, ROC-RK3588-RT), AI boxes | Known for custom boards [NV] | RK3588 6 TOPS | RK3588 alternative to Geniatech | Not found | Day trip to Guangzhou if time allows |
| — | Realtimes | — | **Beijing** | Jetson carriers/boxes | — | — | Not Shenzhen | — | Remote |
| — | Forlinx | — | Baoding (Hebei) [NV] | SoMs | — | — | Not Shenzhen | — | — |

---

## 5. Category D — Networking / PoE

| # | Company | Website | Location | Product | OEM/ODM | Tech | Why useful | Contact | Agenda |
|---|---|---|---|---|---|---|---|---|---|
| D1 | **UTEPO** | utepo.net | 5F, Bldg B, Tiange Sci-Tech Park, 2 Luozu Industrial Ave, Shiyan St, **Bao'an** (2021 datasheets). Older: Nanshan Hi-Tech Park M-8 Bldg | PoE switches (surveillance-focused) | **"Personalized ODM/OEM services"** (IFSEC) | 250 m long-reach PoE; industrial gigabit PoE up to 200 m; 60 W HPoE | Court poles are often >100 m from the club house | Not found | Outdoor 8-port GbE PoE+ with 250 m mode, SFP uplink, VLAN; OEM label |
| D2 | **3onedata** | 3onedata.com [NV] | 3/B, Zone 1, Baiwangxin Industrial Park, Songbai Rd, **Nanshan** | Industrial Ethernet, PoE | Manufacturer | IES6300: 8× GbE PoE (802.3af/at, 30 W), 2.5G/1G SFP; DIN-rail, wide temp | Rugged pole-cabinet switch | Not found | IP40 DIN-rail PoE + fibre uplink; −40–75°C |
| D3 | **TP-Link (Omada / VIGI)** | tp-link.com | **Nanshan** (Hi-Tech Park campus, ~100,000 m²) | Managed PoE, Wi-Fi, VIGI cameras | Unlikely for a startup | Omada SDN, cloud management | Easy managed network across a club | Not found | Distributor pricing; Omada controller |
| D4 | **Optical Network Video Technologies (Shenzhen) — ONV** | (Security Essen listing) | Shenzhen (district not confirmed) | PoE switches | **"Supports professional OEM and ODM orders"** | — | OEM PoE alternative | Not found | — |
| D5 | **Shenzhen Hisource Technology** | (Security Essen listing) | 2F, C Bldg, Zhenjia Industrial Park, 175 Huasheng Rd, **Longhua** | PoE switches | Exhibitor | — | Longhua cluster stop | Not found | — |
| D6 | **Shenzhen EP Smart Link Tech** | (Security Essen listing) | 2F, No. 43 Langkou Industrial Park, Dalang St, **Longhua** | PoE / network | Exhibitor | — | Longhua cluster stop (near Do3think) | Not found | — |
| — | Scodeno | — | Origin not confirmed | Industrial PoE (246 W, IP40) | — | — | — | — | — |
| — | Hasivo | — | Alibaba shows **Sichuan** Hasivo Electronics | 2.5G/10G PoE | — | — | Cheap 2.5G PoE | — | — |
| — | Yuxinhe, Wanglink | — | Not searched (budget) | — | — | — | — | — | — |

---

## 6. Category E — Electronics manufacturing / ODM  (all [NV]: search budget exhausted)

| # | Company | Location (background knowledge) | Use for ScoreX | Agenda |
|---|---|---|---|---|
| E1 | **JLCPCB (Shenzhen JLC Technology Group)** | Shenzhen (Bao'an HQ [NV]); plants elsewhere in Guangdong/Zhuhai [NV] | Proto PCB + SMT for camera carrier and scoreboard controller | Proto → small-batch PCBA flow; parts library |
| E2 | **PCBWay** | Shenzhen (Bao'an [NV]) | PCB/PCBA, CNC/3D-printed enclosures | Enclosure + PCBA turnkey |
| E3 | **Seeed Fusion** (see C1) | Nanshan | PCBA + Jetson carrier ODM | Combine with C1 meeting |
| E4 | **NextPCB / HQ Electronics** | Shenzhen [NV] | PCBA alternative | Price benchmark |
| E5 | **Kingford** | Shenzhen [NV] | Turnkey PCBA | — |
| E6 | Small-format LED scoreboard makers | Shenzhen (Bao'an/Longgang LED cluster [NV]) | Court-side LED score display fed by ScoreX API | Search not completed: shortlist via Alibaba "LED tennis scoreboard Shenzhen" before trip |

---

## 7. Trade events vs trip dates (all [NV]: not searched; confirm on organiser sites)

| Event | Typical timing | Overlap with early Nov 2026? |
|---|---|---|
| Canton Fair Phase 1 (Guangzhou, electronics) | Oct 15–19, 2026 (per brief) | **No.** Client misses it |
| HKTDC Hong Kong Electronics Fair (Autumn) | Mid-Oct (~Oct 13–16, 2026) | **No.** Sinoseen exhibited at HKTDC Electronics Fair, so check the online exhibitor list for leads |
| Global Sources HK Consumer Electronics | Mid-Oct (HK AsiaWorld-Expo) | **No** |
| CPSE (China Public Security Expo, Shenzhen) | Biennial, odd years (2025 edition held; next expected **2027**) | **No 2026 edition expected.** Verify |
| China Hi-Tech Fair (CHTF), Shenzhen | Usually mid-Nov | **Possible overlap** if the trip runs into mid-Nov. Check 2026 dates |
| ELEXCON (Shenzhen electronics/embedded) | Varies (2025 edition was late Aug [NV]) | Check 2026 dates |
| Security Essen 2026 (Germany) | Sept 2026 | Already past. Its exhibitor list is useful: Anpviz/Yyton, Hisource, EP Smart Link, ONV |

**Recommendation:** treat the trip as **direct factory visits**. Use HKTDC and Security Essen 2026 exhibitor lists as lead sources. Check the CHTF 2026 dates.

---

## 8. Geographic clustering for a 4–5 day Shenzhen itinerary

| Day / cluster | Companies | Notes |
|---|---|---|
| **Nanshan (Hi-Tech Park / Xili / Intl Innovation Valley)** | Seeed (TCL E City), Geniatech + OBSBOT (both Intl Innovation Valley, Xili), Sunell (Liuxian Ave), EVOC (Gaoxin), 3onedata (Songbai Rd), TP-Link, ELP/Ailipu (Taoyuan) | Densest cluster. Seeed + Geniatech + OBSBOT can be done in one day |
| **Longhua (Guanhu / Dalang / Longhua St)** | MindVision (Huaning Rd), Do3think (Dalang), Sinoseen (Guanhu), Anpviz/Yyton, Hisource, EP Smart Link | **Camera day**: industrial GS + modules + PoE |
| **Bao'an (Xixiang / Shiyan / Shajing / Xin'an)** | Radxa (Xixiang), Utepo (Shiyan), Apexis factory (Shajing), Insta360 (Xin'an), JLCPCB/PCBWay [NV] | Near the airport, so suits arrival/departure days |
| **Longgang (Buji / Bantian)** | Minrray (Buji), Telycam (Baoqing Rd), YCX Electronics (Bantian, OEM PTZ/IP) | PTZ/broadcast half-day |
| **Dongguan / Huizhou** | No verified targets found this session | Factory follow-ups after an office meeting |
| **Outside Shenzhen** | Firefly (Guangzhou), Hikvision/Dahua/Uniview/Hikrobot/iRAYPLE (Hangzhou), Milesight (Xiamen), Kiloview (Changsha), Magewell (Nanjing), Daheng/Realtimes (Beijing), XbotGo (Suzhou) | Video calls, or an optional Hangzhou extension |

---

## 9. Sources (URLs seen in search results this session)

- MindVision catalogs: https://www.directindustry.com/prod/mindvision/product-4605927-2750988.html ; https://pdf.directindustry.com/pdf/mindvision-4605927.html
- Do3think: https://www.emva.org/members/shenzhen-do3think-technology-co-ltd/ ; https://search.therobotreport.com/listings/shenzhen-do3think-technology-co-cn/ ; https://fr.made-in-china.com/co_do3think01
- Minrray: https://directory.ifsecglobal.com/minrray-industry-co-ltd-comp224995.html ; https://pitchbook.com/profiles/company/231754-51 ; https://www.asmag.com/product_detail.aspx?id=13054
- Sunell: https://ar.sunellsecurity.com/uploads/file/sunell-video-surveillance-products-selection-guide-2024.pdf ; https://www.sunellsecurity.com/fr/about-us/ ; https://bouncewatch.com/company/sunell-technology
- ELP/Ailipu: https://es.made-in-china.com/co_ellipe ; https://www.komachine.com/ko/companies/elp
- Arducam: https://www.arducam.com/arducam-2-3mp-color-global-shutter-usb3-uvc-camera-module-with-onboard-isp-for-robotics-and-machine-vision.html ; https://www.arducam.com/arducam-rapidrange-1080p-color-global-shutter-120-hfov-wide-angle-gmsl2-ip67-camera-module.html
- Sinoseen: https://www.embedded-world.de/en/exhibitors/shenzhen-sinoseen-technology-coltd-2611149 ; https://www.hktdc.com/event/hkelectronicsfairae/en/product/1Z03NP3HI
- Kayeton: https://kinovea.org/en/forum/viewtopic.php?id=921
- Apexis: https://b2brazil.com/hotsite/apexis
- Anpviz/Yyton: https://www.security-essen.de/impetus_provider/exhibitor-list/detail/shenzhen-yyton-digital-technology-co-ltd-23f54 ; https://www.ebay.de/str/anpvizcctvdirect
- Telycam / PTZ OEMs: https://www.made-in-china.com/factory/cctv-ptz-controller.html ; https://directory.ifsecglobal.com/280651
- Tenveo: https://brandwiki.lazada.com.ph/tenveo/ ; https://freshdi.com/supplier/Shenzhen-Tongveo-Video-Tech-Co-Ltd--AQZRZB
- OBSBOT: https://www.cbinsights.com/company/obsbot ; https://brandwiki.lazada.com.ph/obsbot/
- Insta360: https://www.morningstar.com.au/investments/security/shse/688775 ; https://en.wikipedia.org/wiki/Insta360
- XbotGo: https://www.preqin.com/data/profile/asset/xbotgo/800636
- Hikrobot: https://www.imveurope.com/supplier/hikrobot ; https://craft.co/hikrobot
- Daheng: https://www.automate.org/companies/china-daheng-group-inc ; MER2 datasheets (supabase-hosted PDFs listed in search)
- Milesight: https://resource.milesight.com/milesight/security/document/datasheet/ad/milesight-product-brochure-full-lineup.pdf ; https://www.milesight.com/company/news/106 ; https://elioplus.com/profiles/vendors/220964/milesight
- Unisheen: https://electronics.alibaba.com/product/h.265-hdmi-encoder ; https://www.ebay.de/itm/355931031597
- URayCoder: https://microcenter.com/support/639155/uraycoder-h264-live-hdmi-video-encoder-supports-rtsp,-rtp,-rtmp,-http,-udp,-srt,-onvif ; https://manuals.plus/category/uraycoder
- Orivision: https://www.made-in-china.com/factory/hdmi-flash-encoder.html ; https://electronics.alibaba.com/product/orivision-encoder
- AVMATRIX: https://digikey.cn/zh/supplier-centers/avmatrix ; https://syntex.tv/avmatrix
- Zowietek: https://ndi.video/?p=10717 ; https://ndi.video/?p=20829
- Kiloview: https://www.kiloview.com/en/support/docs/ndi-hx/wifi-encoder ; Magewell: https://www.cbinsights.com/company/magewell
- NVR OEMs: https://www.made-in-china.com/factory/ip-camera-nvr.html ; https://www.asmag.com/axview.co
- Seeed: https://www.edgeir.com/companies/seeed-studio ; https://ti.com/partner/de-de/SEEED ; https://mm.digikey.com/Volume0/opasdata/d220001/medias/docus/5883/Nvidia%20Series%20Catalog.pdf
- Geniatech: https://www.embedded-world.de/en/exhibitors/geniatech-2611737 ; https://www.geniatech.com/edge-ai-box-industrial-nxp-imx95/ ; https://a-leads.co/company/3259234_40e186bf
- Radxa: https://www.radxa.com/about ; https://www.electronicdesign.com/directory/boards-systems/boards/company/55386308/radxa
- Firefly: https://www.cnx-software.com/2023/12/17/firefly-aio-3588q-8k-ai-board-features-octa-core-cpu-and-6-tops-npu/ ; https://cxotoday.com/story/asias-leading-indigenous-single-board-computer-sbc-innovators-powering-the-next-tech-frontier/
- Realtimes: https://store.sundance.com/product-category/realtimes/
- Mekotronics: https://www.cnx-software.com/2026/07/03/nvidia-jetson-orin-nano-nx-based-mekotronics-ai-box-targets-humanoid-robots-smart-cities-management-transportation-applications/
- EVOC: https://www.intel.com/content/www/us/en/partner/showcase/storefront/a5S3b0000016OBhEAM/evoc-intelligent-technology-co-ltd.html ; https://fr.made-in-china.com/co_igortang
- Beelink / Minisforum: https://en.wikipedia.org/wiki/Beelink ; https://en.wikipedia.org/wiki/Minisforum ; https://nascompares.com/tag/minisforum-factory/
- Utepo: https://directory.ifsecglobal.com/225124 ; https://telesystem.ro/teledbnew/uploads/5113/UTP1218-PSB150%20Datasheet%20V1.0%2020210805.pdf
- 3onedata: https://automa.net/de/unternehmen/3onedata-co-ltd ; https://www.intertraffic.com/amsterdam/exhibitors/3onedata-co-ltd
- ONV: https://security-essen.de/impetus_provider/exhibitor-list/detail/optical-network-video-technologies-shenzhen-co-ltd-c79e1
- Hisource: https://www.security-essen.de/impetus_provider/exhibitor-list/detail/shenzhen-hisource-technology-co-ltd-35f32
- EP Smart Link: https://www.security-essen.de/impetus_provider/exhibitor-list/detail/shenzhen-ep-smart-link-tech-co-ltd-aa456
- Scodeno: https://www.wisp.pl/p8683,scodeno-xptn-9000-65-8tp.html ; Hasivo: https://www.servethehome.com/the-ultimate-cheap-2-5gbe-poe-unmanaged-switch-hasivo-s1100p-8gt/
- TP-Link: https://en.wikipedia.org/wiki/TP-Link ; https://static.tp-link.com/resources/document/TP-LINK-Press-Kit.pdf

## 10. Open items before outreach
1. Open each official site (WebFetch was blocked in this session) and confirm the address, sales email and showroom.
2. Complete Category E (JLCPCB/PCBWay/LED scoreboard) and the event dates (CHTF, ELEXCON 2026). The search budget ran out before these.
3. Resolve the entity for Tenveo, URayCoder, Zowietek, Hasivo and Scodeno.
4. Ask every camera vendor the same RFQ: resolution/fps at 4K and 1080p, shutter type, PTP/NTP sync or hardware trigger, RTSP/ONVIF/SDK, IP rating, PoE class, MOQ, NRE, lead time, CE/FCC.
