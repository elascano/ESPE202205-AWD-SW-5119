Rails.application.routes.draw do
  resources :people
  resources :programs
  resources :subject_jsons
  resources :subjects
  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html

  # Defines the root path route ("/")
  # root "articles#index"
end
