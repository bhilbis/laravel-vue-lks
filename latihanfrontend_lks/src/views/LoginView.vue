<template>
  <div class="container">
    <section class="vh-85 mt-1">
      <div class="container py-3 h-95">
        <div class="row d-flex justify-content-center align-items-center h-95">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem">
              <div class="row g-0">
                <div class="col-md-7 col-lg-5 d-none d-md-block">
                  <img
                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img2.webp"
                    alt="login form"
                    class="img-fluid"
                    style="border-radius: 1rem 0 0 1rem "
                  />
                </div>
                <div
                  class="col-md-4 col-lg-7 d-flex align-items-center"
                  style="background-color: #065c58"
                >
                  <div class="card-body p-4 p-lg-4 text-black">
                    <form @submit.prevent="submitLogin">
                      <div class="d-flex align-items-center mb-4 pb-1 ms-5">
                        <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                        <span class="h1 fw-bold mb-0 ms-5">Login Page</span>
                      </div>
                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                        Sign into your account
                      </h5>
                      <!-- <div class="form-outline mb-4">
                        <label class="form-label" for="id_card_number">Id Card Number</label>
                        <input
                          type="text"
                          id="id_card_number"
                          class="form-control form-control-lg"
                          v-model="id_card_number"
                        />
                      </div> -->
                      <div class="form-outline mb-4">
                        <label class="form-label" for="name">Username</label>
                        <input
                          type="text"
                          id="name"
                          class="form-control form-control-lg"
                          v-model="name"
                        />
                      </div>
                      <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input
                          type="password"
                          id="password"
                          class="form-control form-control-lg"
                          v-model="password"
                        />
                      </div>
                      <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                      </div>

                      <a class="small text-muted" href="#!">Forgot password?</a> <br />
                      <!-- <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                            style="color: #393f81;">Register here</a></p> -->
                      <a href="#!" class="small text-muted me-2">Terms of use.</a>
                      <a href="#!" class="small text-muted">Privacy policy</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import useSocieties from '../compossable/societies'

const router = useRouter()
const { login } = useSocieties()

// const id_card_number = ref('')
const name = ref('')
const password = ref('')
const errorMessage = ref('')

const submitLogin = async () => {
  try {
    await login ({ name: name.value, password: password.value})

    router.push({ name: 'crud'})
  } catch (error) {
    console.error('Login error', error)

    errorMessage.value = 'Login failed. Please check your credentials and try again.'
  } finally {
    router.push({ name: 'crud'})
  }
}
</script>
