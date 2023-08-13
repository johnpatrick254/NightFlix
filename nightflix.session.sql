DROP TABLE videoProgress;
CREATE TABLE videoProgress
        (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(150),
            videoId INT,
            progress INT DEFAULT 0,
            finished TINYINT DEFAULT 0,
            dateModified DATETIME DEFAULT CURRENT_TIMESTAMP
        )