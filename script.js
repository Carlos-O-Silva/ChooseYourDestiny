const loginForm = document.querySelector('#login-form')
            const characterEyes = loginForm.querySelector('.eyes')
            const usernameInput = loginForm.querySelector('.username')
            const passwordInput = loginForm.querySelector('.password')

            function updateEyeballPosition(value) {
                if (typeof value !== 'number') {
                    const offset = usernameInput.value.length * (100 / usernameInput.maxLength)
                    value = Math.max(Math.min(offset, 90), 10)
                }

                characterEyes.style.setProperty('--eye-ball-offset', `${value}%`);
            }

            usernameInput.addEventListener('keyup', () => updateEyeballPosition())
            usernameInput.addEventListener('focus', () => updateEyeballPosition())
            usernameInput.addEventListener('blur', () => updateEyeballPosition(50))

            passwordInput.addEventListener('focus', () => characterEyes.classList.add('closed'))
            passwordInput.addEventListener('blur', () => characterEyes.classList.remove('closed'))

