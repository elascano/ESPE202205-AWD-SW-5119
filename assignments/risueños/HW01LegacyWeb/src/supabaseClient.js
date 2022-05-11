import { createClient } from '@supabase/supabase-js'

const supabaseUrl = 'https://wablxlpyiqmklweicppg.supabase.co'
const supabaseAnonKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6IndhYmx4bHB5aXFta2x3ZWljcHBnIiwicm9sZSI6ImFub24iLCJpYXQiOjE2NDU0MTQzNjQsImV4cCI6MTk2MDk5MDM2NH0.QvFgdvvC9uPPoS69Zw1gRNYbEdB2hnTByLj-Unbfe90'

export const supabase = createClient(supabaseUrl, supabaseAnonKey)