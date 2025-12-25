<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion / Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .form-container {
            transition: all 0.3s ease-in-out;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-500 to-indigo-700 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden">
        
        <!-- Onglets -->
        <div class="flex border-b">
            <button id="tab-login" class="w-1/2 py-4 text-center font-semibold text-blue-600 border-b-2 border-blue-600 transition-colors">
                Connexion
            </button>
            <button id="tab-signup" class="w-1/2 py-4 text-center font-semibold text-gray-500 hover:text-blue-600 transition-colors">
                Inscription
            </button>
        </div>

        <div class="p-8">
            <!-- Formulaire de Connexion -->
            <form id="form-login" action="login.php" method="POST" class="form-container space-y-5">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Bon retour !</h2>
                    <p class="text-gray-500">Connectez-vous à votre compte</p>
                    <?php 
                    if (isset($_SESSION["inscrire"])) {
                        echo $_SESSION["inscrire"];
                        unset($_SESSION["inscrire"]);
                    }
                    ?>
                </div>
                
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" required name="connexion_email" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" placeholder="email@exemple.com" required>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" required name="connexion_password" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-gray-600">
                        <input type="checkbox" class="mr-2"> Se souvenir de moi
                    </label>
                    <a href="#" class="text-blue-600 hover:underline">Mot de passe oublié ?</a>
                </div>

                <button type="submit" name="connexion_button" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:scale-[1.02]">
                    Se connecter
                </button>
            </form>

            <!-- Formulaire d'Inscription (Caché par défaut) -->
            <form id="form-signup" action="sign_up.php" method="POST" class="form-container space-y-5 hidden">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Créer un compte</h2>
                    <p class="text-gray-500">Rejoignez-nous dès aujourd'hui</p>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nom complet</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" required name="inscrire_fullname" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" placeholder="Jean Dupont" required>
                    </div>
                </div>
                
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" required name="inscrire_email" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" placeholder="email@exemple.com" required>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" required name="inscrire_password" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" name="inscrire_button" class="w-full bg-green-600 text-white font-bold py-2 rounded-lg hover:bg-green-700 transition duration-300 transform hover:scale-[1.02]">
                    S'inscrire
                </button>
            </form>

            <!-- Séparateur Social -->
            <div class="mt-8">
                <div class="relative flex py-5 items-center">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="flex-shrink mx-4 text-gray-400 text-sm">Ou continuer avec</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <div class="flex gap-4">
                    <button class="w-full flex items-center justify-center border py-2 rounded-lg hover:bg-gray-50 transition">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5 mr-2" alt="Google">
                        Google
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sélection des éléments
        const tabLogin = document.getElementById('tab-login');
        const tabSignup = document.getElementById('tab-signup');
        const formLogin = document.getElementById('form-login');
        const formSignup = document.getElementById('form-signup');

        // Fonction pour basculer vers le Login
        tabLogin.addEventListener('click', () => {
            // Update Tabs
            tabLogin.classList.add('border-blue-600', 'text-blue-600', 'border-b-2');
            tabLogin.classList.remove('text-gray-500');
            tabSignup.classList.remove('border-blue-600', 'text-blue-600', 'border-b-2');
            tabSignup.classList.add('text-gray-500');

            // Update Forms
            formLogin.classList.remove('hidden');
            formSignup.classList.add('hidden');
        });

        // Fonction pour basculer vers le Signup
        tabSignup.addEventListener('click', () => {
            // Update Tabs
            tabSignup.classList.add('border-blue-600', 'text-blue-600', 'border-b-2');
            tabSignup.classList.remove('text-gray-500');
            tabLogin.classList.remove('border-blue-600', 'text-blue-600', 'border-b-2');
            tabLogin.classList.add('text-gray-500');

            // Update Forms
            formSignup.classList.remove('hidden');
            formLogin.classList.add('hidden');
        });
    </script>
</body>
</html>