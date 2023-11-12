import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import DeviseView from '../views/Devises/View.vue'
import DeviseCreate from '../views/Devises/Create.vue'
import DeviseEdit from '../views/Devises/Edit.vue'

import CreatePaire from '../views/Paires/CreatePaire.vue'
import PaireView from '../views/Paires/PaireView.vue'
import editPaire from '../views/Paires/EditPaire.vue'

const router = createRouter({

  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    
    {
      path: '/devise',
      name: 'devise',
      component: DeviseView
    },
    {
      path: '/devise/create',
      name: 'deviseCreate',
      component: DeviseCreate
    },
    {
      path: '/devise/:id/edit',
      name: 'deviseEdit',
      component: DeviseEdit
    },
  
    {
      path: '/paire',
      name: 'paire',
      component: PaireView
    },
    {
      path: '/paire/:id/edit',
      name: 'editPaire',
      component: editPaire
    },
    
    {
      path: '/paire/create',
      name: 'createPaire',
      component: CreatePaire
    },
    
  ]
})

export default router
