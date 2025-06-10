import { createClient } from "https://esm.sh/@supabase/supabase-js@2"

// Configuration CORRECTE avec le schéma spécifié
const supabase = createClient(
  "https://jcquyvoijndgbhqwccbx.supabase.co",
  "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImpjcXV5dm9pam5kZ2JocXdjY2J4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDg5NTgyODksImV4cCI6MjA2NDUzNDI4OX0.a4l3jwBt3AEdhpMT6qfzIA1SlmX29NiCWWto1DvysqI",
  {
    db: {
      schema: 'public' // LA CLÉ DU PROBLÈME
    },
    auth: {
      persistSession: false // Important pour les requêtes sans auth
    }
  }
)

// Version ULTRA-SÉCURISÉE du gestionnaire de formulaire
document.getElementById("contactForm")?.addEventListener('submit', async (e) => {
  e.preventDefault()
  
  // 1. Validation des données
  const getValue = (id) => {
    const el = document.getElementById(id)
    return el ? el.value.trim() : null
  }

  const formData = {
    email: getValue("email"),
    fullname: getValue("fullname"),
    statut: getValue("statut"),
    telephone: getValue("telephone"),
    budget: getValue("budget"),
    message: getValue("message")
  }

  // 2. Vérification des champs obligatoires
  if (!formData.email || !formData.statut) {
    return Swal.fire("Erreur", "Email et statut sont obligatoires", "error")
  }

  try {
    // 3. Requête OPTIMISÉE
    const { error } = await supabase
      .from('contacts')
      .insert(formData) // Format simplifié

    if (error) throw error

    // 4. Redirection dynamique
    const redirectMap = {
      restaurateur: "https://lien-restaurateur.com",
      fournisseur: "https://lien-fournisseur.com"
    }
    window.location.href = redirectMap[formData.statut] || "/"

  } catch (error) {
    console.error("Erreur complète:", error)
    Swal.fire({
      title: 'Erreur technique',
      html: `<code>${error.code}: ${error.message}</code>`,
      icon: 'error'
    })
  }
})