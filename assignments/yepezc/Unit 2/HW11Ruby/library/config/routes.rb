Rails.application.routes.draw do
  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html
  get "/bands" to: band_params;
  # Defines the root path route ("/")
  # root "articles#index"
end
