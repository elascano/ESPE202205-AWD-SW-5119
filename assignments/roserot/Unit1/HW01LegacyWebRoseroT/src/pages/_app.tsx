import '../styles/globals.css'
import 'src/styles/register.css'
import 'src/styles/login-style.css'
// import 'semantic-ui-css/semantic.min.css'

import type { AppProps } from 'next/app'


function MyApp({ Component, pageProps }: AppProps) {
  return <Component {...pageProps} />
}

export default MyApp
