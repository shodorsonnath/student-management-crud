--
-- Table structure for table `student_info`
--
CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `mid1` int(11),
  `mid2` int(11),
  `final` int(11),
  `total` int(11),
  `grade` varchar(10)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Dumping data for table `student_info`
--
INSERT INTO `student_info` (`id`, `name`, `email`, `mid1`, `mid2`, `final`) VALUES
(1001, 'shodorson1', 'shodorson1@gmail.com', '40', '20', '20'),
(1002, 'shodorson2', 'shodorson2@gmail.com', '30', '20', '20'),
(1003, 'shodorson3', 'shodorson3@gmail.com', '40', '20', '20'),
(1004, 'shodorson4', 'shodorson4@gmail.com', '30', '20', '20'),
(1005, 'shodorson5', 'shodorson5@gmail.com', '40', '20', '20'),
(1006, 'shodorson6', 'shodorson6@gmail.com', '30', '20', '20'),
(1007, 'shodorson7', 'shodorson7@gmail.com', '40', '20', '20');
-- --------------------------------------------------------
--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);
-- --------------------------------------------------------
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
