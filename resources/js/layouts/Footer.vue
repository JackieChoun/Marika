<template>
    <footer
        class="wrapper flex w-full flex-col items-center gap-6 border-t border-gray-300 bg-white py-5 text-center lg:flex-row lg:justify-between lg:text-left"
    >
        <!-- Nom + réseaux sociaux -->
        <div class="flex flex-col items-center gap-3 lg:gap-4">
            <p class="text-lg">
                &copy; {{ new Date().getFullYear() }} Marika Perros
            </p>
            <div class="hidden gap-8 lg:flex">
                <a href="#" target="_blank" rel="noopener noreferrer">
                    <img
                        src="/images/Instagram.svg"
                        alt="Instagram"
                        class="h-6 w-6"
                    />
                </a>
                <a href="#" target="_blank" rel="noopener noreferrer">
                    <img
                        src="/images/Facebook.svg"
                        alt="Facebook"
                        class="h-6 w-6"
                    />
                </a>
            </div>
        </div>

        <!-- Coordonnées -->
        <div class="flex flex-col gap-1 text-center">
            <a href="tel:+33621802660" class="text-gray-600 hover:underline"
                >06.21.80.26.60</a
            >
            <p>2 chemin Christophe Gluck</p>
            <p>31100 Toulouse</p>
            <a href="mailto:marikaperros1@gmail.com" class="hover:underline">
                marikaperros1@gmail.com
            </a>
        </div>

        <!-- Liens -->
        <div class="flex flex-col gap-1">
            <a
                href="/mentions-legales"
                target="_blank"
                class="hover:underline"
                rel="noopener noreferrer"
            >
                Mentions légales
            </a>
            <a href="mailto:ydv311@hotmail.fr" class="hover:underline">
                Réalisation : XYZ.Dev
            </a>
        </div>

        <div class="flex gap-10 lg:hidden">
            <a href="#" target="_blank" rel="noopener noreferrer">
                <img
                    src="/images/Instagram.svg"
                    alt="Instagram"
                    class="h-6 w-6"
                />
            </a>
            <a href="#" target="_blank" rel="noopener noreferrer">
                <img
                    src="/images/Facebook.svg"
                    alt="Facebook"
                    class="h-6 w-6"
                />
            </a>
        </div>
    </footer>
</template>
