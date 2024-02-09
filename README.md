To run trigger 


/*
Trigger for User's Balance to User's Wallet
*/
DELIMITER $$

CREATE DEFINER = CURRENT_USER TRIGGER `users_AFTER_UPDATE` AFTER UPDATE ON `users` FOR EACH ROW
BEGIN

    DECLARE wallet_count INTEGER DEFAULT 0;
	SELECT COUNT(1) INTO wallet_count FROM user_wallet WHERE user_id = NEW.id;
	IF (wallet_count = 0 ) THEN        
	     INSERT INTO `user_wallets` (`user_id`,`wallet`,`ag_wallet`,`gb_wallet`,`g8_wallet`,`jk_wallet`,`jd_wallet`,`l4_wallet`,`k9_wallet`,`pg_wallet`,`pr_wallet`,`re_wallet`,`s3_wallet`,`status`,`created_at`,`updated_at`)

		SELECT NEW.id,NEW.balance,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1,now(),now();     
	ELSE
		UPDATE `user_wallets` SET wallet = NEW.balance , updated_at = now() WHERE user_id = NEW.id;
        END IF;
    END$$

DELIMITER ;