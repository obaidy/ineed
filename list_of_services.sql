INSERT INTO `list_of_services`
(`name`, `image`, `slug`) 
VALUES 
('Babysitter', '', 'babysitter'),
('Plumber', '', 'plumber'),
('Electrician', '', 'electrician'),
('Pet Walker', '', 'pet-walker'),
('Movers', '', 'movers'),
('Gardener', '', 'gardener'),
('Cook', '', 'cook'),
('Maid', '', 'maid'),
('Personal Shopper', '', 'personal-shopper'),
('Hitman', '', 'hitman'),
('IT Services', '', 'it-services'),
('Personal Trainer', '', 'personal-trainer');

-- new
INSERT INTO `categories`
(`name`, `image`, `slug`) 
VALUES 
('Babysitter', '', 'babysitter'),
('Personal Trainer', '', 'personal-trainer'),
('Gardener', '', 'gardener'),
('Housekeeper', '', 'housekeeper');

-- some users
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'slavo', 'slavo.kozar@gmail.com', NULL, '$2y$10$J4qti40z4F0H2KivzDqtDOhG04oAh1EQvnCTP9mNWBDyi7o1CCsOS', 'user', NULL, '2019-06-20 10:56:14', '2019-06-20 10:56:14'),
(2, 'sean', 'seandnimmo@gmail.com', NULL, '$2y$10$0DmzOZsxZnrcT9xvUrnqwuz7D..6k9fiq7/Wa/xQ8xheXUs3/7Hbu', 'provider', NULL, '2019-06-20 11:02:15', '2019-06-20 11:02:15');

