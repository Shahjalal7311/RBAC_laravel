namespace :deploy do
  desc 'Execute artisan db:seed'
  task :load_seeds do
    Rake::Task['laravel:artisan'].invoke('db:seed')
  end

  after 'deploy:updating', 'deploy:load_seeds'
end