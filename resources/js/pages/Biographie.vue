<script setup>
import SiteLayout from '@/layouts/SiteLayout.vue';
</script>

<template>
    <SiteLayout>
        <h1
            class="pt-4 pb-6 text-center text-5xl font-extralight lg:py-5 lg:text-7xl"
        >
            Biographie
        </h1>

        <article class="lg:py-13">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <!-- Colonne gauche : CV -->
                <div>
                    <!-- Intro avec texte en float sur image -->
                    <section class="mb-12">
                        <div class="relative">
                            <img
                                src="/images/marika.png"
                                alt="Portrait de Marika Perros, peintre"
                                class="float-left mr-3 h-52 w-auto"
                            />
                            <h2 class="text-2xl font-light">Marika Perros</h2>
                            <p class="mb-2 text-sm font-semibold text-gray-500">
                                Artiste-peintre
                            </p>
                            <p class="text-justify text-sm leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum
                                dolore eu fugiat nulla pariatur. Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit. Sed
                                do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Lorem
                                ipsum dolor sit amet consectetur adipisicing
                                elit. Perferendis laboriosam dolor quam
                                consectetur veritatis molestiae reprehenderit
                                esse, iusto et eaque nemo necessitatibus.
                                Corporis repellat ratione at sequi voluptates
                                cupiditate nihil.
                            </p>
                        </div>
                    </section>

                    <!-- Études -->
                    <section class="mb-10" aria-label="Études">
                        <h2
                            class="mb-4 border-b pb-2 text-lg font-semibold tracking-widest uppercase"
                        >
                            Études
                        </h2>
                        <ul class="space-y-1 text-sm text-gray-700">
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >1980 – 1985</time
                                >
                                <span
                                    >Det Jyske Kunst Akademiet — Aarhus,
                                    Danemark</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >1985 – 1988</time
                                >
                                <span>EPIAR - Villa Arson — Nice, France</span>
                            </li>
                        </ul>
                    </section>

                    <!-- Résidences -->
                    <section class="mb-10" aria-label="Résidences d'artistes">
                        <h2
                            class="mb-4 border-b pb-2 text-lg font-semibold tracking-widest uppercase"
                        >
                            Résidences d'artistes
                        </h2>
                        <ul class="space-y-1 text-sm text-gray-700">
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >2015</time
                                ><span
                                    >KIIT University — Inde<br />Jijel —
                                    Algérie</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >2014</time
                                ><span>Azemour — Maroc</span>
                            </li>
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >2012</time
                                ><span
                                    >Mars Centre d'Art Contemporain d'Essaouira
                                    — Maroc</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >2006</time
                                ><span>Casa d'Espagne — Béziers, France</span>
                            </li>
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >2005</time
                                ><span>Crimée Koktebell — Ukraine</span>
                            </li>
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >1996</time
                                ><span
                                    >Taller des Horts — Mallorca, Espagne</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >1992</time
                                ><span>Pollen — Montflanquin, France</span>
                            </li>
                            <li class="flex gap-4">
                                <time class="w-24 shrink-0 font-semibold"
                                    >Depuis 1998</time
                                ><span
                                    >Atelier d'artiste attribué par la DRAC —
                                    Toulouse</span
                                >
                            </li>
                        </ul>
                    </section>

                    <!-- Collections -->
                    <section aria-label="Collections">
                        <h2
                            class="mb-4 border-b pb-2 text-lg font-semibold tracking-widest uppercase"
                        >
                            Collections privées et publiques
                        </h2>
                        <p class="text-sm text-gray-700">
                            Espagne, France, Belgique, Italie, Danemark,
                            Norvège, États-Unis, Maroc, Angleterre, Suisse,
                            Luxembourg, Hollande, Inde, Australie.
                        </p>
                    </section>
                </div>

                <!-- Colonne droite : Expositions -->
                <div class="grid grid-cols-2 gap-12">
                    <!-- Expositions personnelles -->
                    <section
                        class="mb-10"
                        aria-label="Expositions personnelles"
                    >
                        <h2
                            class="mb-4 border-b pb-2 text-lg font-semibold tracking-widest uppercase"
                        >
                            Expositions personnelles
                        </h2>
                        <ul class="space-y-1 text-sm text-gray-700">
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2024/25</time
                                ><span
                                    >Portes Ouvertes Occitanie — Toulouse,
                                    France<br />Art en Balade — Toulouse,
                                    France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2023</time
                                ><span>Le Carmel — Tarbes, France</span>
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2022</time
                                ><span
                                    >Atelier Marcel Hastir — Bruxelles,
                                    Belgique</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2021</time
                                ><span
                                    >Atelier Marcel Hastir — Bruxelles,
                                    Belgique</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2020</time
                                ><span
                                    >Atelier Marcel Hastir — Bruxelles,
                                    Belgique</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2019</time
                                ><span>Atelier A — Toulouse, France</span>
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2018</time
                                ><span
                                    >Atelier Marcel Hastir — Bruxelles,
                                    Belgique<br />Centre culturel Henri Desbals
                                    — Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2017</time
                                ><span
                                    >Appart'Diverz'art — Paris, France<br />Galerie
                                    Maurice Ravel — Paris, France<br />Espace
                                    Guireau — Castanet, France<br />Atelier A —
                                    Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2016</time
                                ><span
                                    >Altigone — St Orens, France<br />Galerie A+
                                    Wellington — Nouvelle Zélande</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2015</time
                                ><span
                                    >Centre Culturel Alban Minville — Toulouse,
                                    France<br />ArtFestival Khajuraho — Inde<br />Atelier
                                    A — Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2014</time
                                ><span
                                    >Museo de las Murallas Reales — Ceuta,
                                    Espagne<br />Parlement Européen —
                                    Strasbourg, France<br />Atelier A —
                                    Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2013</time
                                ><span
                                    >Galeria Bozart — Lisbonne, Portugal<br />Théâtre
                                    Musical de Pibrac — France<br />Théâtre de
                                    l'Entresort — Narbonne, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2012</time
                                ><span
                                    >Institut Culturel Français de Marrakech —
                                    Maroc</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2011</time
                                ><span
                                    >Parlement Européen — Strasbourg, France<br />Galeria
                                    Paqui Delgado — San Sadurni, Espagne<br />Galerie
                                    Tiny Factory — Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2010</time
                                ><span
                                    >Festival Hitra — Norvège<br />Imprimerie
                                    168 — Paris, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2008</time
                                ><span
                                    >Galerie Art Bruc — Catalogne, Espagne<br />Galerie
                                    Alter Ego — Bruges, Belgique</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2007</time
                                ><span
                                    >Galerie Tiny Factory — Toulouse,
                                    France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2005</time
                                ><span
                                    >Galerie Original'Art — Ibiza, Espagne<br />Musée
                                    d'Art et d'histoire — Nice, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2004</time
                                ><span
                                    >Galerie Tiny Factory — Toulouse, France<br />MJC
                                    Roguet — Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2002</time
                                ><span
                                    >Galerie Tiny Factory — Toulouse, France<br />Galerie
                                    du Tableau — Marseille, France<br />Château
                                    de la Linardié — Gaillac</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2001</time
                                ><span
                                    >Kryne'art — Paris, France<br />Galerie Ste
                                    Catherine — Rodez, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2000</time
                                ><span
                                    >Château de Tourettes sur Loup — Côte
                                    d'Azur<br />Abbaye de la Colle — Côte
                                    d'Azur<br />Espace Matra — Toulouse,
                                    France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1999</time
                                ><span
                                    >Galerie Tiny Factory — Toulouse, France<br />Galerie
                                    Pulzzart — Castres, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1998</time
                                ><span
                                    >Détours — Pau, France<br />Hôtel du
                                    Département ODAC — Béziers, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1997</time
                                ><span>Archipel — Toulouse, France</span>
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1992</time
                                ><span
                                    >Galerie 27 — Toulouse, France<br />Centre
                                    culturel St Cyprien — Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1991</time
                                ><span
                                    >Galerie Robert Boeuf — Toulon, France<br />Espace
                                    Matra — Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1990</time
                                ><span
                                    >Galerie Cath'art — Paris, France<br />Galerie
                                    27 — Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1989</time
                                ><span
                                    >Château de Lavardens — Auch, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1985</time
                                ><span
                                    >Det Jyske Kunst Akademiet — Aarhus,
                                    Danemark</span
                                >
                            </li>
                        </ul>
                    </section>

                    <!-- Expositions collectives -->
                    <section aria-label="Expositions collectives">
                        <h2
                            class="mb-4 border-b pb-2 text-lg font-semibold tracking-widest uppercase"
                        >
                            Expositions collectives
                        </h2>
                        <ul class="space-y-1 text-sm text-gray-700">
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2020</time
                                ><span
                                    >Portes Ouvertes Occitanie — Toulouse,
                                    France<br />Art en Balade — Toulouse,
                                    France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2019</time
                                ><span
                                    >Portes Ouvertes Occitanie — Toulouse,
                                    France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2018</time
                                ><span>Art en Balade — Toulouse, France</span>
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2017</time
                                ><span
                                    >Contempo"reine" — Paris, France<br />Phaart
                                    — Bagnères de Bigorre, France<br />Atelier A
                                    — Toulouse, France<br />Noir Blanc Rouge —
                                    Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2016</time
                                ><span
                                    >Nayart — Nay, France<br />100cm² — Carla
                                    Bayle, France<br />Atelier A — Toulouse,
                                    France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2015</time
                                ><span
                                    >Sala del portal del Pardo all Vendrell —
                                    Espagne<br />Terra Nullius — Villafranca,
                                    Espagne<br />KIIT University — Bhubaneshwar,
                                    Inde<br />Atelier A — Toulouse, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2014</time
                                ><span
                                    >Salon Euro-méditerranéen — Jijel,
                                    Algérie<br />Institut Cervantes — Tanger,
                                    Maroc<br />Atelier A — Toulouse,
                                    France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2012</time
                                ><span
                                    >Biennale Internationale — Casablanca,
                                    Maroc<br />Biennale d'œuvres sur papier —
                                    San Pere de Riudebitlles, Espagne<br />École
                                    d'Architecture — Barcelone, Espagne</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2010</time
                                ><span
                                    >Clairs Obscurs UMAM — Biennale Château
                                    Grimaldi, Côte d'Azur<br />Biennale de
                                    papier — San Pere de Riudebitlles,
                                    Espagne</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2006</time
                                ><span
                                    >Hôtel du Département — Béziers, France<br />Arte
                                    Nimes — Nîmes, France<br />Biennale des Arts
                                    — Fez, Maroc</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >2005</time
                                ><span
                                    >Musée des Beaux-Arts — Kiev, Ukraine<br />Arte
                                    Nimes — Nîmes, France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1999</time
                                ><span
                                    >Galerie Amalia Mahoney — Chicago, USA<br />Galerie
                                    Culturas — Santander, Espagne<br />Parlamento
                                    de Cantabria — Santander, Espagne</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1998</time
                                ><span
                                    >Institut Culturel Français — Tanger,
                                    Maroc<br />Institut Cervantes — Rabat,
                                    Maroc<br />Salon de mai — Paris,
                                    France</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1996</time
                                ><span
                                    >Parlement Européen — Bruxelles,
                                    Belgique</span
                                >
                            </li>
                            <li class="flex gap-4">
                                <time class="w-16 shrink-0 font-semibold"
                                    >1990</time
                                ><span
                                    >Biennale des jeunes créateurs — Marseille,
                                    France<br />Étoiles de la peinture —
                                    Toulouse, France</span
                                >
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </article>
    </SiteLayout>
</template>
