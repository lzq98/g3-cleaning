USE home_service;
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c1@test.com', 'c1', 'Test customer 1', '0400000001', '23 Main Street', 'Adelaide', 'SA', MD5('customer1'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c2@test.com', 'c2', 'Test customer 2', '0400000002', '84 Church Street', 'Adelaide', 'SA', MD5('customer2'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c3@test.com', 'c3', 'Test customer 3', '0400000003', '3 Knig Ave', 'Sydney', 'NSW', MD5('customer3'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c4@test.com', 'c4', 'Test customer 4', '0400000004', '35 George Street', 'Canberra', 'ACT', MD5('customer4'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c5@test.com', 'c5', 'Test customer 5', '0400000005', '63 Victoria Street', 'Melbourne', 'VIC', MD5('customer5'));

INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `password`) VALUES
('w1@test.com', 'Test worker 1', '0410000001', 'Melbourne', 'VIC', MD5('worker1'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `password`) VALUES
('w2@test.com', 'Test worker 2', '0410000002', 'Adelaide', 'SA', MD5('worker2'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `password`) VALUES
('w3@test.com', 'Test worker 3', '0410000003', 'Sydney', 'NSW', MD5('worker3'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `password`) VALUES
('w4@test.com', 'Test worker 4', '0410000004', 'Adelaide', 'SA', MD5('worker4'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `password`) VALUES
('w5@test.com', 'Test worker 5', '0410000005', 'Sydney', 'NSW', MD5('worker5'));