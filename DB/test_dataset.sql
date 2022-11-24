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
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c6@test.com', 'c6', 'Test customer 6', '0400000006', '62 Queen Street', 'Melbourne', 'VIC', MD5('customer6'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c7@test.com', 'c7', 'Test customer 7', '0400000007', '123 Swonston Street', 'Melbourne', 'VIC', MD5('customer7'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c8@test.com', 'c8', 'Test customer 8', '0400000008', '42 Latrobe Street', 'Melbourne', 'VIC', MD5('customer8'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c9@test.com', 'c9', 'Test customer 9', '0400000009', '232 Abeckt Street', 'Melbourne', 'VIC', MD5('customer9'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c10@test.com', 'c10', 'Test customer 10', '0400000010', '511 Abeckt Street', 'Brisbane', 'QLD', MD5('customer10'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c11@test.com', 'c11', 'Test customer 11', '0400000011', '888 George Street', 'Gold Coast', 'QLD', MD5('customer11'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c12@test.com', 'c12', 'Test customer 12', '0400000012', '999 Frank Street', 'Melbourne', 'VIC', MD5('customer12'));
INSERT INTO `customer` (
  `email`, `username`, `name`, `phone`, `address`, `city`, `state`, `password`) VALUES
('c13@test.com', 'c13', 'Test customer 13', '0400000013', '666 Town Street', 'Melbourne', 'VIC', MD5('customer13'));



INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w1@test.com', 'Test worker 1', '0410000001', 'Melbourne', 'VIC', 28, 4.80, MD5('worker1'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w2@test.com', 'Test worker 2', '0410000002', 'Adelaide', 'SA', 25, 4.76, MD5('worker2'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w3@test.com', 'Test worker 3', '0410000003', 'Sydney', 'NSW', 30, 3.92, MD5('worker3'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w4@test.com', 'Test worker 4', '0410000004', 'Adelaide', 'SA', 30, 4.78, MD5('worker4'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`, `healthy`) VALUES
('w5@test.com', 'Test worker 5', '0410000005', 'Sydney', 'NSW', 40, 4.97, MD5('worker5'), false);
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w6@test.com', 'Test worker 6', '0410000006', 'Adelaide', 'SA', 5, 2.13, MD5('worker6'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w7@test.com', 'Test worker 7', '0410000007', 'Melbourne', 'VIC', 30, 4.02, MD5('worker7'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w8@test.com', 'Test worker 8', '0410000008', 'Adelaide', 'SA', 30, 4.12, MD5('worker8'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w9@test.com', 'Test worker 9', '0410000009', 'Melbourne', 'VIC', 33, 3.78, MD5('worker9'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`, `healthy`) VALUES
('w10@test.com', 'Test worker 10', '0410000010', 'Camberra', 'ACT', 31, 3.23, MD5('worker10'), false);
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w11@test.com', 'Test worker 11', '0410000011', 'Gold Coast', 'QLD', 34, 3.87, MD5('worker11'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w12@test.com', 'Test worker 12', '0410000012', 'Brisbane', 'QLD', 50, 5.00, MD5('worker12'));
INSERT INTO `worker` (
  `email`, `name`, `phone`, `city`, `state`, `price`, `rating`, `password`) VALUES
('w13@test.com', 'Test worker 13', '0410000013', 'Adelaide', 'SA', 22, 2.22, MD5('worker13'));




INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('2', '4', '110 ABC street', 'Adelaide', 'SA', '0001-12-22', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('2', '4', '111 AAA street', 'Adelaide', 'SA', '2022-12-02', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('3', '1', '112 BBB street', 'Brisbane', 'QLD', '2022-12-12', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('3', '5', '113 CCC street', 'Brisbane', 'QLD', '2022-12-23', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('4', '2', '114 King street', 'Brisbane', 'QLD', '2022-12-04', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('4', '8', '115 Queen street', 'Melbourne', 'VIC', '2022-12-08', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('5', '3', '116 Williams street', 'Melbourne', 'VIC', '2022-12-01', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('5', '7', '117 Town street', 'Camberra', 'ACT', '2022-12-09', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'paid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', '2', '118 Frank street', 'Camberra', 'ACT', '2022-12-09', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'paid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', '3', '119 Linkon street', 'Adelaide', 'SA', '2022-12-11', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'paid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', '4', '1120 York street', 'Adelaide', 'SA', '2022-12-22', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'paid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', '4', '1121 New street', 'Adelaide', 'SA', '2022-12-22', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'canceled');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', '10', '1122 Ring street', 'Adelaide', 'SA', '2022-11-22', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'canceled');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', '7', '1123 Bell street', 'Adelaide', 'SA', '2022-11-02', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'canceled');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', '12', '1124 Swonston street', 'Adelaide', 'SA', '2022-11-30', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'canceled');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', '12', '1124 Big street', 'Adelaide', 'SA', '2022-11-30', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'canceled');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', 0, '1124 Sally street', 'Adelaide', 'SA', '2022-11-30', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', 0, '1125 Broadway street', 'Adelaide', 'SA', '2022-11-30', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', 0, '1126 Wall street', 'Adelaide', 'SA', '2022-11-30', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', 0, '1127 Washington  street', 'Adelaide', 'SA', '2022-11-30', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', 0, '1128 Doyers street', 'Adelaide', 'SA', '2022-11-30', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');
INSERT INTO `orders` ( `customer`, `worker`, `address`, `city`, `state`, `date`, `start`, `end`, `subject`, `message`, `comment`, `rating`, `price`, `status`) VALUES 
('1', 0, '1129 Bank street', 'Adelaide', 'SA', '2022-11-30', NULL, NULL, 'whatever', 'something', NULL, NULL, NULL, 'notpaid');



INSERT INTO `admin` (
  `email`, `username`, `name`, `phone`, `password`) VALUES 
('a1@test.com', 'a1', 'admin 1', '0420000001', MD5('admin1'));
INSERT INTO `admin` (
  `email`, `username`, `name`, `phone`, `password`) VALUES 
('a2@test.com', 'a2', 'admin 2', '0420000002', MD5('admin2'));
