# find_keyword('a', ["Astrology", "Astronomy", "Astrology & Astronomy"]) 
# 	=> 'Astrology & Astronomy'

def find_keyword(query, keyword_list)
  best_match = nil
  max_length = 0
  max_capitals = 0

  keyword_list.each do |keyword|
    if keyword.downcase.include?(query.downcase)
      current_length = keyword.length
      current_capitals = keyword.scan(/[A-Z]/).size
      puts current_capitals
      puts current_length

      if current_length > max_length || (current_length == max_length && current_capitals > max_capitals)
        max_length = current_length
        max_capitals = current_capitals
        best_match = keyword
      end
    end
  end

  best_match
end

find_keyword('a', ["Astrology", "Astronomy", "Astrology & Astronomy"])
