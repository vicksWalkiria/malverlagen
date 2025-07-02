<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Drawing;
use Illuminate\Database\Seeder;

class DrawingSeeder extends Seeder
{
    public function run(): void
    {
        $dibujos = [
            // Tiere (Animales)
            ['Tiere', 'Katze', '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200">
                <defs>
                    <linearGradient id="catGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FFDAB9;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFC0CB;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <circle cx="100" cy="110" r="70" fill="url(#catGradient)" stroke="#E0B0FF" stroke-width="3"/>
                <circle cx="70" cy="80" r="20" fill="#333"/>
                <circle cx="130" cy="80" r="20" fill="#333"/>
                <circle cx="70" cy="78" r="10" fill="white"/>
                <circle cx="130" cy="78" r="10" fill="white"/>
                <circle cx="70" cy="78" r="3" fill="#00BFFF"/>
                <circle cx="130" cy="78" r="3" fill="#00BFFF"/>
                <path d="M70 140 Q100 165 130 140" fill="none" stroke="#FF69B4" stroke-width="4"/>
                <path d="M50 80 L30 60 L60 70 Z" fill="#FFDAB9" stroke="#E0B0FF" stroke-width="2"/>
                <path d="M150 80 L170 60 L140 70 Z" fill="#FFDAB9" stroke="#E0B0FF" stroke-width="2"/>
                <line x1="85" y1="110" x2="70" y2="100" stroke="#333" stroke-width="1"/>
                <line x1="85" y1="115" x2="70" y2="120" stroke="#333" stroke-width="1"/>
                <line x1="85" y1="120" x2="70" y2="130" stroke="#333" stroke-width="1"/>
                <line x1="115" y1="110" x2="130" y2="100" stroke="#333" stroke-width="1"/>
                <line x1="115" y1="115" x2="130" y2="120" stroke="#333" stroke-width="1"/>
                <line x1="115" y1="120" x2="130" y2="130" stroke="#333" stroke-width="1"/>
            </svg>'],
            ['Tiere', 'Fisch', '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="100" viewBox="0 0 200 100">
                <defs>
                    <linearGradient id="fishGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#6495ED;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#87CEEB;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M20 50 Q60 10 120 50 Q60 90 20 50 Z" fill="url(#fishGradient)" stroke="#4682B4" stroke-width="3"/>
                <path d="M120 50 L180 30 L180 70 Z" fill="#FF8C00" stroke="#DAA520" stroke-width="3"/>
                <circle cx="40" cy="50" r="7" fill="#333"/>
                <circle cx="38" cy="48" r="3" fill="white"/>
                <path d="M55 60 Q65 70 75 60" fill="none" stroke="#333" stroke-width="2"/>
                <path d="M55 40 Q65 30 75 40" fill="none" stroke="#333" stroke-width="2"/>
                <path d="M80 50 Q90 40 100 50 Q90 60 80 50 Z" fill="#4682B4"/>
            </svg>'],
            ['Tiere', 'Vogel', '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="150" viewBox="0 0 200 150">
                <defs>
                    <linearGradient id="birdGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFA500;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <ellipse cx="100" cy="80" rx="60" ry="40" fill="url(#birdGradient)" stroke="#DAA520" stroke-width="3"/>
                <circle cx="70" cy="70" r="10" fill="#333"/>
                <circle cx="68" cy="68" r="4" fill="white"/>
                <path d="M60 90 L80 90 L70 105 Z" fill="#FF8C00" stroke="#DAA520" stroke-width="2"/>
                <path d="M140 80 Q160 60 180 80 Q160 100 140 80 Z" fill="#FFD700" stroke="#DAA520" stroke-width="2"/>
                <path d="M50 110 L60 130 L40 130 Z" fill="#333" stroke="#333" stroke-width="2"/>
                <path d="M150 110 L140 130 L160 130 Z" fill="#333" stroke="#333" stroke-width="2"/>
                <path d="M100 60 C110 50 120 50 130 60" fill="none" stroke="#DAA520" stroke-width="2"/>
            </svg>'],

            // Fahrzeuge (Vehículos)
            ['Fahrzeuge', 'Auto', '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="100" viewBox="0 0 200 100">
                <defs>
                    <linearGradient id="carGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#DC143C;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FF6347;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <rect x="20" y="40" width="160" height="40" rx="10" ry="10" fill="url(#carGradient)" stroke="#B22222" stroke-width="3"/>
                <path d="M40 40 L60 20 L140 20 L160 40 Z" fill="#ADD8E6" stroke="#4682B4" stroke-width="2"/>
                <circle cx="50" cy="80" r="18" fill="#333"/>
                <circle cx="50" cy="80" r="12" fill="#666"/>
                <circle cx="150" cy="80" r="18" fill="#333"/>
                <circle cx="150" cy="80" r="12" fill="#666"/>
                <rect x="155" y="45" width="10" height="10" fill="#FFD700"/>
                <rect x="35" y="45" width="10" height="10" fill="#FFD700"/>
            </svg>'],
            ['Fahrzeuge', 'Flugzeug', '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="100" viewBox="0 0 200 100">
                <defs>
                    <linearGradient id="planeGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#ADD8E6;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#87CEEB;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M20 50 L180 50 L160 40 L160 60 Z" fill="url(#planeGradient)" stroke="#4682B4" stroke-width="3"/>
                <path d="M60 50 L80 20 L100 50 Z" fill="url(#planeGradient)" stroke="#4682B4" stroke-width="2"/>
                <path d="M60 50 L80 80 L100 50 Z" fill="url(#planeGradient)" stroke="#4682B4" stroke-width="2"/>
                <circle cx="180" cy="50" r="8" fill="#333"/>
                <rect x="40" y="45" width="10" height="10" fill="white"/>
                <rect x="60" y="45" width="10" height="10" fill="white"/>
                <rect x="80" y="45" width="10" height="10" fill="white"/>
                <rect x="100" y="45" width="10" height="10" fill="white"/>
            </svg>'],
            ['Fahrzeuge', 'Zug', '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="100" viewBox="0 0 200 100">
                <defs>
                    <linearGradient id="trainGradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#B22222;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#DC143C;stop-opacity:1" />
                    </linearGradient>
                    <linearGradient id="trainGradient2" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#4682B4;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#6A5ACD;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <rect x="20" y="30" width="70" height="40" rx="5" ry="5" fill="url(#trainGradient1)" stroke="#8B0000" stroke-width="3"/>
                <rect x="90" y="30" width="70" height="40" rx="5" ry="5" fill="url(#trainGradient2)" stroke="#2F4F4F" stroke-width="3"/>
                <path d="M30 30 L40 15 L80 15 L90 30 Z" fill="#B22222" stroke="#8B0000" stroke-width="2"/>
                <circle cx="45" cy="75" r="12" fill="#333"/>
                <circle cx="45" cy="75" r="8" fill="#666"/>
                <circle cx="135" cy="75" r="12" fill="#333"/>
                <circle cx="135" cy="75" r="8" fill="#666"/>
                <rect x="30" y="40" width="10" height="10" fill="#FFD700"/>
                <rect x="100" y="40" width="10" height="10" fill="#FFD700"/>
                <line x1="90" y1="50" x2="90" y2="50" stroke="#333" stroke-width="2"/>
            </svg>'],

            // Anime & Manga
            ['Anime & Manga', 'Kawaii Gesicht', '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200">
                <defs>
                    <radialGradient id="faceGradient" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                        <stop offset="0%" style="stop-color:#FFEFD5;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFDAB9;stop-opacity:1" />
                    </radialGradient>
                </defs>
                <circle cx="100" cy="100" r="80" fill="url(#faceGradient)" stroke="#E0B0FF" stroke-width="3"/>
                <circle cx="75" cy="80" r="18" fill="#333"/>
                <circle cx="125" cy="80" r="18" fill="#333"/>
                <circle cx="70" cy="78" r="8" fill="white"/>
                <circle cx="120" cy="78" r="8" fill="white"/>
                <circle cx="72" cy="82" r="4" fill="#00BFFF"/>
                <circle cx="122" cy="82" r="4" fill="#00BFFF"/>
                <path d="M80 130 Q100 155 120 130" fill="none" stroke="#FF69B4" stroke-width="5" stroke-linecap="round"/>
                <path d="M60 110 Q70 125 80 110" fill="none" stroke="#FF69B4" stroke-width="3"/>
                <path d="M120 110 Q130 125 140 110" fill="none" stroke="#FF69B4" stroke-width="3"/>
                <circle cx="60" cy="115" r="5" fill="#FFC0CB" opacity="0.7"/>
                <circle cx="140" cy="115" r="5" fill="#FFC0CB" opacity="0.7"/>
            </svg>'],
            ['Anime & Manga', 'Stern', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <defs>
                    <linearGradient id="starGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFA500;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <polygon points="50,5 61,35 95,35 68,57 79,90 50,70 21,90 32,57 5,35 39,35" fill="url(#starGradient)" stroke="#DAA520" stroke-width="3"/>
                <circle cx="50" cy="30" r="3" fill="white" opacity="0.8"/>
                <circle cx="70" cy="50" r="3" fill="white" opacity="0.8"/>
                <circle cx="30" cy="50" r="3" fill="white" opacity="0.8"/>
            </svg>'],
            ['Anime & Manga', 'Drache', '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="150" viewBox="0 0 200 150">
                <defs>
                    <linearGradient id="dragonGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#32CD32;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#228B22;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M20 100 C50 20 150 20 180 100" fill="url(#dragonGradient)" stroke="#006400" stroke-width="4"/>
                <path d="M180 100 L190 80 L170 80 Z" fill="#FF4500" stroke="#DC143C" stroke-width="2"/>
                <circle cx="30" cy="95" r="8" fill="#333"/>
                <circle cx="28" cy="93" r="3" fill="white"/>
                <path d="M50 90 C60 70 80 70 90 90" fill="none" stroke="#333" stroke-width="2"/>
                <path d="M100 90 C110 70 130 70 140 90" fill="none" stroke="#333" stroke-width="2"/>
                <path d="M150 100 C160 110 170 100 180 110" fill="none" stroke="#006400" stroke-width="3"/>
                <path d="M160 100 C170 115 180 100 190 115" fill="none" stroke="#006400" stroke-width="3"/>
            </svg>'],

            // Weihnachten (Navidad)
            ['Weihnachten', 'Baum', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="150" viewBox="0 0 100 150">
                <defs>
                    <linearGradient id="treeGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#228B22;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#3CB371;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <polygon points="50,10 20,70 80,70" fill="url(#treeGradient)" stroke="#006400" stroke-width="2"/>
                <polygon points="50,40 25,100 75,100" fill="url(#treeGradient)" stroke="#006400" stroke-width="2"/>
                <rect x="40" y="100" width="20" height="40" fill="#8B4513" stroke="#654321" stroke-width="2"/>
                <circle cx="50" cy="25" r="7" fill="#FFD700" stroke="#DAA520" stroke-width="1"/>
                <circle cx="35" cy="70" r="5" fill="#DC143C"/>
                <circle cx="65" cy="70" r="5" fill="#00BFFF"/>
                <circle cx="45" cy="50" r="5" fill="#FFD700"/>
                <circle cx="55" cy="85" r="5" fill="#DC143C"/>
                <circle cx="30" cy="90" r="5" fill="#00BFFF"/>
            </svg>'],
            ['Weihnachten', 'Glocke', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="120" viewBox="0 0 100 120">
                <defs>
                    <linearGradient id="bellGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFA500;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M30,30 Q50,0 70,30 Q75,80 50,100 Q25,80 30,30 Z" fill="url(#bellGradient)" stroke="#DAA520" stroke-width="3"/>
                <circle cx="50" cy="100" r="7" fill="#333"/>
                <line x1="50" y1="10" x2="50" y2="30" stroke="#DAA520" stroke-width="3"/>
                <circle cx="50" cy="15" r="5" fill="#DC143C"/>
            </svg>'],
            ['Weihnachten', 'Stern', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <defs>
                    <linearGradient id="xmasStarGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFA500;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <polygon points="50,5 61,35 95,35 68,57 79,90 50,70 21,90 32,57 5,35 39,35" fill="url(#xmasStarGradient)" stroke="#DAA520" stroke-width="3"/>
                <circle cx="50" cy="30" r="3" fill="white" opacity="0.8"/>
                <circle cx="70" cy="50" r="3" fill="white" opacity="0.8"/>
                <circle cx="30" cy="50" r="3" fill="white" opacity="0.8"/>
            </svg>'],

            // Ostern (Pascua)
            ['Ostern', 'Ei', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="150" viewBox="0 0 100 150">
                <defs>
                    <radialGradient id="eggGradient" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                        <stop offset="0%" style="stop-color:#FFEFD5;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFC0CB;stop-opacity:1" />
                    </radialGradient>
                </defs>
                <ellipse cx="50" cy="75" rx="40" ry="60" fill="url(#eggGradient)" stroke="#E0B0FF" stroke-width="3"/>
                <path d="M20 75 Q50 60 80 75" fill="none" stroke="#DC143C" stroke-width="3"/>
                <path d="M20 95 Q50 80 80 95" fill="none" stroke="#00BFFF" stroke-width="3"/>
                <path d="M20 115 Q50 100 80 115" fill="none" stroke="#32CD32" stroke-width="3"/>
                <circle cx="30" cy="70" r="3" fill="white"/>
                <circle cx="70" cy="80" r="3" fill="white"/>
            </svg>'],
            ['Ostern', 'Hase', '<svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150">
                <defs>
                    <radialGradient id="bunnyGradient" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                        <stop offset="0%" style="stop-color:#FFEFD5;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFDAB9;stop-opacity:1" />
                    </radialGradient>
                </defs>
                <circle cx="75" cy="100" r="40" fill="url(#bunnyGradient)" stroke="#E0B0FF" stroke-width="3"/>
                <path d="M60 60 L50 10 L60 20 L70 10 Z" fill="url(#bunnyGradient)" stroke="#E0B0FF" stroke-width="2"/>
                <path d="M90 60 L100 10 L90 20 L80 10 Z" fill="url(#bunnyGradient)" stroke="#E0B0FF" stroke-width="2"/>
                <circle cx="65" cy="90" r="7" fill="#333"/>
                <circle cx="85" cy="90" r="7" fill="#333"/>
                <circle cx="63" cy="88" r="3" fill="white"/>
                <circle cx="83" cy="88" r="3" fill="white"/>
                <path d="M70 115 Q75 125 80 115" fill="none" stroke="#FF69B4" stroke-width="4"/>
                <path d="M55 105 Q65 110 70 105" fill="none" stroke="#FFC0CB" stroke-width="2"/>
                <path d="M80 105 Q85 110 95 105" fill="none" stroke="#FFC0CB" stroke-width="2"/>
            </svg>'],
            ['Ostern', 'Blume', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <defs>
                    <radialGradient id="flowerCenterGradient" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                        <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFA500;stop-opacity:1" />
                    </radialGradient>
                    <linearGradient id="petalGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FFB6C1;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FF69B4;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <circle cx="50" cy="50" r="15" fill="url(#flowerCenterGradient)" stroke="#DAA520" stroke-width="2"/>
                <circle cx="50" cy="25" r="12" fill="url(#petalGradient)" stroke="#DC143C" stroke-width="2"/>
                <circle cx="75" cy="50" r="12" fill="url(#petalGradient)" stroke="#DC143C" stroke-width="2"/>
                <circle cx="50" cy="75" r="12" fill="url(#petalGradient)" stroke="#DC143C" stroke-width="2"/>
                <circle cx="25" cy="50" r="12" fill="url(#petalGradient)" stroke="#DC143C" stroke-width="2"/>
                <line x1="50" y1="65" x2="50" y2="90" stroke="#228B22" stroke-width="4" stroke-linecap="round"/>
                <path d="M50 75 Q40 85 30 80" fill="none" stroke="#228B22" stroke-width="3"/>
                <path d="M50 75 Q60 85 70 80" fill="none" stroke="#228B22" stroke-width="3"/>
            </svg>'],

            // Kostenlos (Gratis)
            ['Kostenlos', 'Herz', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="90" viewBox="0 0 100 90">
                <defs>
                    <linearGradient id="heartGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#DC143C;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FF6347;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M10,30 Q10,10 30,10 Q50,10 50,30 Q50,10 70,10 Q90,10 90,30 Q90,50 50,80 Q10,50 10,30 Z" fill="url(#heartGradient)" stroke="#8B0000" stroke-width="3"/>
                <circle cx="35" cy="25" r="5" fill="white" opacity="0.7"/>
                <circle cx="65" cy="25" r="5" fill="white" opacity="0.7"/>
            </svg>'],
            ['Kostenlos', 'Stern', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <defs>
                    <linearGradient id="freeStarGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFA500;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <polygon points="50,5 61,35 95,35 68,57 79,90 50,70 21,90 32,57 5,35 39,35" fill="url(#freeStarGradient)" stroke="#DAA520" stroke-width="3"/>
                <circle cx="50" cy="30" r="3" fill="white" opacity="0.8"/>
                <circle cx="70" cy="50" r="3" fill="white" opacity="0.8"/>
                <circle cx="30" cy="50" r="3" fill="white" opacity="0.8"/>
            </svg>'],
            ['Kostenlos', 'Wolke', '<svg xmlns="http://www.w3.org/2000/svg" width="150" height="100" viewBox="0 0 150 100">
                <defs>
                    <linearGradient id="cloudGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#ADD8E6;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#87CEEB;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M20,60 Q20,30 50,30 Q60,10 80,20 Q100,10 110,30 Q140,30 140,60 Z" fill="url(#cloudGradient)" stroke="#6495ED" stroke-width="3"/>
                <circle cx="40" cy="45" r="5" fill="white" opacity="0.5"/>
                <circle cx="70" cy="35" r="5" fill="white" opacity="0.5"/>
                <circle cx="100" cy="45" r="5" fill="white" opacity="0.5"/>
            </svg>'],

            // Sonstige (Otros)
            ['Sonstige', 'Haus', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <defs>
                    <linearGradient id="houseBodyGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#D2B48C;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#BC8F8F;stop-opacity:1" />
                    </linearGradient>
                    <linearGradient id="houseRoofGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#B22222;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#DC143C;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <rect x="20" y="40" width="60" height="40" fill="url(#houseBodyGradient)" stroke="#8B4513" stroke-width="3"/>
                <polygon points="20,40 50,10 80,40" fill="url(#houseRoofGradient)" stroke="#8B0000" stroke-width="3"/>
                <rect x="45" y="55" width="10" height="20" fill="#87CEEB" stroke="#4682B4" stroke-width="1"/>
                <rect x="65" y="45" width="10" height="10" fill="#87CEEB" stroke="#4682B4" stroke-width="1"/>
                <path d="M50 20 L50 40" stroke="#8B0000" stroke-width="2"/>
                <circle cx="50" cy="15" r="3" fill="#FFD700"/>
            </svg>'],
            ['Sonstige', 'Sonne', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <defs>
                    <radialGradient id="sunGradient" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                        <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFA500;stop-opacity:1" />
                    </radialGradient>
                </defs>
                <circle cx="50" cy="50" r="30" fill="url(#sunGradient)" stroke="#DAA520" stroke-width="3"/>
                <line x1="50" y1="10" x2="50" y2="0" stroke="#DAA520" stroke-width="3"/>
                <line x1="50" y1="90" x2="50" y2="100" stroke="#DAA520" stroke-width="3"/>
                <line x1="10" y1="50" x2="0" y2="50" stroke="#DAA520" stroke-width="3"/>
                <line x1="90" y1="50" x2="100" y2="50" stroke="#DAA520" stroke-width="3"/>
                <line x1="25" y1="25" x2="15" y2="15" stroke="#DAA520" stroke-width="3"/>
                <line x1="75" y1="25" x2="85" y2="15" stroke="#DAA520" stroke-width="3"/>
                <line x1="25" y1="75" x2="15" y2="85" stroke="#DAA520" stroke-width="3"/>
                <line x1="75" y1="75" x2="85" y2="85" stroke="#DAA520" stroke-width="3"/>
                <circle cx="50" cy="50" r="5" fill="white" opacity="0.5"/>
            </svg>'],
            ['Sonstige', 'Blume', '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <defs>
                    <radialGradient id="otherFlowerCenterGradient" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                        <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FFA500;stop-opacity:1" />
                    </radialGradient>
                    <linearGradient id="otherPetalGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FFB6C1;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#FF69B4;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <circle cx="50" cy="50" r="15" fill="url(#otherFlowerCenterGradient)" stroke="#DAA520" stroke-width="2"/>
                <circle cx="50" cy="25" r="12" fill="url(#otherPetalGradient)" stroke="#DC143C" stroke-width="2"/>
                <circle cx="75" cy="50" r="12" fill="url(#otherPetalGradient)" stroke="#DC143C" stroke-width="2"/>
                <circle cx="50" cy="75" r="12" fill="url(#otherPetalGradient)" stroke="#DC143C" stroke-width="2"/>
                <circle cx="25" cy="50" r="12" fill="url(#otherPetalGradient)" stroke="#DC143C" stroke-width="2"/>
                <line x1="50" y1="65" x2="50" y2="90" stroke="#228B22" stroke-width="4" stroke-linecap="round"/>
                <path d="M50 75 Q40 85 30 80" fill="none" stroke="#228B22" stroke-width="3"/>
                <path d="M50 75 Q60 85 70 80" fill="none" stroke="#228B22" stroke-width="3"/>
            </svg>'],
        ];

        foreach ($dibujos as [$cat, $title, $svg]) {
            $category = Category::where('name', $cat)->first();
            if (! $category) {
                continue;
            }

            Drawing::create([
                'title' => $title,
                'slug' => str()->slug($cat.'-'.$title),
                'category_id' => $category->id,
                'svg_content' => $svg,
                'downloads' => 0,
            ]);
        }
    }
}
